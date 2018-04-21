<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    }

    // All Users - GET - /api/users
    public function testAllUsersEndpoint()
    {
        factory(\Ingresse\User::class, 20)->create();

        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    // All Users - GET - /api/users
    public function testAllUsersEndpointNoRecord($value='')
    {
        \Redis::del('users');
        $response = $this->get('/api/users');

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'record not found',
        ]);
    }

    // Get user - GET - /api/user/{id}
    public function testGetUserEndpoint()
    {
        $user = factory(\Ingresse\User::class)->create();

        $response = $this->get('/api/users/' . $user->id);
        $response->assertStatus(200);

        $response = $this->get('/api/users/' . ($user->id + rand(1, 20)));
        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'record not found',
        ]);
    }

    // New user - POST - /api/users
    public function testNewUserEndpoint()
    {
        $userData = factory(\Ingresse\User::class)->make()->getAttributes();

        $response = $this->json('POST', '/api/users', $userData);
        $responseData = array_diff_key($userData, ['password' => 'x', 'remember_token' => 'x']);

        $response->assertStatus(201);
        $response->assertJson($responseData);

        $response = $this->json('POST', '/api/users', $userData);
        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'email' => ['email cannot be duplicated'],
            ],
        ]);
    }

    // Delete user - DELETE - /api/users/{id}
    public function testeDeleteUserEndpoint()
    {
        $user = factory(\Ingresse\User::class)->create();

        $response = $this->delete('/api/users/' . $user->id);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'record deleted',
        ]);

        $response = $this->delete('/api/users/' . ($user->id + rand(1, 20)));
        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'record not found',
        ]);
    }

    // Update user - PUT - /api/users/{id}
    public function testUpdateUserEndpoint()
    {
        $user = factory(\Ingresse\User::class)->create();
        $newEmail = factory(\Ingresse\User::class)->make()->email;

        $response = $this->put('/api/users/' . $user->id, ['email' => $newEmail]);
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'record updated',
        ]);

        $response = $this->put('/api/users/' . ($user->id + rand(1, 20)), ['active' => 0]);
        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'record not found',
        ]);

        $response = $this->put('/api/users/' . ($user->id + rand(1, 20)), ['email' => $newEmail]);
        $response->assertStatus(302);
    }

}
