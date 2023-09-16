<?php

namespace Tests\Feature\Production\Family;

use App\Models\Api\v1\Production\Family\Family;
use Database\Factories\Api\v1\Production\Family\FamilyFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListFamiliesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_fetch_all_families()
    {
        $this->withoutExceptionHandling();
        $families = Family::factory()->count(3)->create();

        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );
        $response->assertOk();

        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];
        $response = $this->getJson(route('api.v1.family.index'), $headers);
        $familiesResp = $response->json('Families');
        assert($familiesResp[0]['idfamilia'] == $families[0]->idfamilia);
        assert($familiesResp[0]['descripcion'] == $families[0]->descripcion);
        assert($familiesResp[1]['idfamilia'] == $families[1]->idfamilia);
        assert($familiesResp[1]['descripcion'] == $families[1]->descripcion);
        assert($familiesResp[2]['idfamilia'] == $families[2]->idfamilia);
        assert($familiesResp[2]['descripcion'] == $families[2]->descripcion);
    }
}
