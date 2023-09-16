<?php

namespace Tests\Feature\Authentiction\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_user_login()
    {
        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );

        $response->assertSuccessful();

        $response->assertJsonFragment([
                'name' => 'Authentication',
                'surname'   => 'Test',
                'email' => 'test@test.com',
                'token_type' => 'Bearer'
        ]);
    }
}
