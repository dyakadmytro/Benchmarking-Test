<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanRegister()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson(route('api.register'), $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    public function testUserCanLogin()
    {
        $user = User::factory()->create([
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);

        $loginData = [
            'email' => 'john@example.com',
            'password' => 'password',
        ];

        $response = $this->postJson(route('api.login'), $loginData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'token',
            ]);
    }

    public function testAuthenticatedUserCanLogout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson(route('api.logout'));

        $response->assertStatus(200);
    }
}
