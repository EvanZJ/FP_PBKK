<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }
    
    public function test_welcome_view()
    {
        $view = $this->get('/');

        $view->assertSee('IKAE');
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

    // public function test_dashboard_view()
    // {
    //     $response = $this->get('/dashboard');

    //     $response->assertSee('Success');
    // }
}
