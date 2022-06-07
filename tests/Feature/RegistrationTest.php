<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;
    public function it_allows_a_user_to_register(){
            $postdata = [
                'email' => $this->faker->email(),
                'name' => $this->faker->name(),
                'password' => 'password',
                'confirm' => 'password',
            ];
            $this->json('POST', route('user.regist'), $postdata)->assertStatus(201);
    }

        // $this->json('POST', route('user.register'), $postdata)->assertStatus(201);
}
