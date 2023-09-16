<?php

namespace Tests\Feature\Production\Origin;

use App\Models\Api\v1\Production\Origin\Origin;
use Database\Factories\Api\v1\Production\Origin\OriginFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListOriginsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_fetch_all_origins()
    {
        $this->withoutExceptionHandling();
        $origins = Origin::factory()->count(3)->create();

        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );
        $response->assertOk();

        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];
        $response = $this->getJson(route('api.v1.origin.index'), $headers);
        $originsResp = $response->json('Origins');
        assert($originsResp[0]['idorigen'] == $origins[0]->idorigen);
        assert($originsResp[0]['descripcion'] == $origins[0]->descripcion);
        assert($originsResp[1]['idorigen'] == $origins[1]->idorigen);
        assert($originsResp[1]['descripcion'] == $origins[1]->descripcion);
        assert($originsResp[2]['idorigen'] == $origins[2]->idorigen);
        assert($originsResp[2]['descripcion'] == $origins[2]->descripcion);
    }
}
