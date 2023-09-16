<?php

namespace Tests\Feature\Production\Family;

use App\Models\Api\v1\Production\Family\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyFamilyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_delete_family()
    {
        $this->withoutExceptionHandling();
        $family = Family::factory()->create();

        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );
        $response->assertOk();

        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];

        $response = $this->deleteJson(route('api.v1.family.destroy', $family->idfamilia), [], $headers);
        $response->assertOk();
        assert(null == Family::latest()->first());
    }
}
