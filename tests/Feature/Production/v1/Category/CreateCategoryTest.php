<?php

namespace Tests\Feature\Production\Category;

use App\Models\Api\v1\Production\Category\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_create_category()
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
        $response = $this->postJson(route('api.v1.category.store'), [
                'descripcion' => 'Categoria demo'
            ],
            $headers
        );

        $response->assertCreated();

        $category = Category::latest()->first();

        $response->assertJsonFragment([
                'type' => 'Category',
                'descripcion' => $category->descripcion,
                'created-at' => $category->created_at->format('Y-m-d H:i:s'),
                'updated-at' => $category->updated_at->format('Y-m-d H:i:s'),
        ]);
    }
}
