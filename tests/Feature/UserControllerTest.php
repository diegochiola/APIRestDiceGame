<?php

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    //use RefreshDatabase;

    public function test_valid_registration()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'nickname' => 'johnd',
            'email' => 'john@example.com',
            'password' => 'Password1'
        ]);

        $response->assertStatus(201);
    }

    public function test_registration_with_non_unique_name()
    {
        $existingUser = User::factory()->create(['name' => 'John Doe']);

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'nickname' => 'johnd',
            'email' => 'john@example.com',
            'password' => 'Password1'
        ]);

        $response->assertStatus(422);
    }

    public function test_registration_with_invalid_email()
    {
        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'nickname' => 'janed',
            'email' => 'invalidemail',
            'password' => 'Password1'
        ]);

        $response->assertStatus(422);
    }

    public function test_registration_with_short_password()
    {
        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'nickname' => 'janed',
            'email' => 'jane@example.com',
            'password' => 'Pass1'
        ]);

        $response->assertStatus(422);
    }

    public function test_registration_with_non_alphanumeric_password()
    {
        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'nickname' => 'janed',
            'email' => 'jane@example.com',
            'password' => 'Password@!'
        ]);

        $response->assertStatus(422);
    }
}