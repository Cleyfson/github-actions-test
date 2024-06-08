<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic test to check if register route exists.
     *
     * @return void
     */
    public function testRegisterRouteExists()
    {
        $response = $this->postJson('api/auth/register');

        $response->assertStatus(422); // Method not allowed (requires POST data)
    }

    /**
     * A basic test to check if login route exists.
     *
     * @return void
     */
    public function testLoginRouteExists()
    {
        $response = $this->postJson('api/auth/login');

        $response->assertStatus(401); // Method not allowed (requires POST data)
    }

    public function testLogoutRouteRequiresAuthentication()
    {
        $response = $this->postJson('api/auth/logout');

        $response->assertStatus(401); // Unauthorized (requires JWT authentication)
    }
}
