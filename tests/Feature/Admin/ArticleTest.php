<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\Factories\ArticleFactory;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_create_article()
    {
        $data = ArticleFactory::new()->getFormData();
        $this->post('/admin/articles', $data)
            ->assertSessionHasNoErrors();
    }

    /** @test @dataProvider \Tests\Factories\ArticleFactory::InvalidDataProvider() */
    public function create_articles_fails_for_following_datas($key)
    {
        $data = ArticleFactory::new()->getFormData();
        // Making Data Invalid to cause validation errors.
        $data = $this->resetData($data, $key);
        $this->expectException(ValidationException::class);
        $this->post('/admin/articles', $data)
            ->assertSessionHasNoErrors();
    }
}
