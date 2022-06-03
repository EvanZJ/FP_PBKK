<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\FuncCall;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_view()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }
    
    public function test_welcome_view()
    {
        $response = $this->get('/');

        $response->assertSee('IKAE');
        $response->assertStatus(200);
    }

    public function test_regis_view()
    {
        $response = $this->get('/registration');

        $response->assertSee('Email Address');
        $response->assertStatus(200);    
    }

    public function test_login_view()
    {
        $response = $this->get('/login');

        $response->assertSee('Email Address');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();
 
        $response = $this->post('/', [
            'email' => $user->email,
            'password' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();
 
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
 
        $this->assertGuest();
    }
}
