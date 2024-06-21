<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_requires_email_and_password()
    {
        $response = $this->postJson('api/auth/register', [
            'email' => 'gecersiz-email',
            'password' => 'password',
            'name' => 'isim'
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'result',
            'validation_error' => [
                'email'
            ]
        ]);
    }

    public function test_register_requires_name()
    {
        $response = $this->postJson('api/auth/register', [
            'email' => 'deneme@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'result',
            'validation_error' => [
                'name'
            ]
        ]);
    }
}
