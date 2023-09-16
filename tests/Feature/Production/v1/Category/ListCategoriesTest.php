<?php

namespace Tests\Feature\Production\Category;

use App\Models\Api\v1\Production\Category\Category;
use Database\Factories\Api\v1\Production\Category\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_fetch_all_categories()
    {
        $this->withoutExceptionHandling();
        $categories = Category::factory()->count(3)->create();

        $response = $this->postJson(route('api.v1.user.login'), [
                'email' => 'test@test.com',
                'password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'
            ]
        );
        $response->assertOk();

        $headers = [
            'Authorization' => 'Bearer ' . $response->json('access_token')
        ];
        $response = $this->getJson(route('api.v1.category.index'), $headers);
        $categoriesResp = $response->json('Categories');
        assert($categoriesResp[0]['idcategoria'] == $categories[0]->idcategoria);
        assert($categoriesResp[0]['descripcion'] == $categories[0]->descripcion);
        assert($categoriesResp[1]['idcategoria'] == $categories[1]->idcategoria);
        assert($categoriesResp[1]['descripcion'] == $categories[1]->descripcion);
        assert($categoriesResp[2]['idcategoria'] == $categories[2]->idcategoria);
        assert($categoriesResp[2]['descripcion'] == $categories[2]->descripcion);
    }
}
