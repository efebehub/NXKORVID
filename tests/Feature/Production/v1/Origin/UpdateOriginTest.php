<?php

namespace Tests\Feature\Production\Origin;

use App\Models\Api\v1\Production\Origin\Origin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateOriginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_update_origin()
    {
        $this->withoutExceptionHandling();
        $origin = Origin::factory()->create();

        // get token authorization
        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );

        $response->assertOk();

        // get the list
        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];

        $response = $this->putJson(route('api.v1.origin.update', $origin->idorigen), [
                'descripcion' => 'Origin updated'
            ],
            $headers
        );

        $response->assertOk();

        $origin = Origin::latest()->first();

        $response->assertJsonFragment([
                'type' => 'Origin',
                'descripcion' => 'Origin updated',
                'created-at' => $origin->created_at->format('Y-m-d H:i:s'),
                'updated-at' => $origin->updated_at->format('Y-m-d H:i:s'),
        ]);
    }
}
