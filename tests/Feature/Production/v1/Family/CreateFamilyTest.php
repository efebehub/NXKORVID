<?php

namespace Tests\Feature\Production\Family;

use App\Models\Api\v1\Production\Family\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateFamilyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_create_family()
    {
        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );

        $response->assertOk();
        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];
        $response = $this->postJson(route('api.v1.family.store'), [
                'descripcion' => 'Categoria demo'
            ],
            $headers
        );

        $response->assertCreated();

        $family = Family::latest()->first();

        $response->assertJsonFragment([
                'type' => 'Family',
                'descripcion' => $family->descripcion,
                'created-at' => $family->created_at->format('Y-m-d H:i:s'),
                'updated-at' => $family->updated_at->format('Y-m-d H:i:s'),
        ]);
    }
}
