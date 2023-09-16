<?php

namespace Tests\Feature\Production\Category;

use App\Models\Api\v1\Production\Category\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_update_category()
    {
        $this->withoutExceptionHandling();
        $category = Category::factory()->create();

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

        $response = $this->putJson(route('api.v1.category.update', $category->idcategoria), [
                'descripcion' => 'Category updated'
            ],
            $headers
        );

        $response->assertOk();

        $category = Category::latest()->first();

        $response->assertJsonFragment([
                'type' => 'Category',
                'descripcion' => 'Category updated',
                'created-at' => $category->created_at->format('Y-m-d H:i:s'),
                'updated-at' => $category->updated_at->format('Y-m-d H:i:s'),
        ]);
    }
}
