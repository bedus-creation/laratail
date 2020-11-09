<?php

namespace Tests\Feature\Admin;

use App\Domain\User\Enums\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Database\Factories\ArticleFactory;
use Database\Factories\UserFactory;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        // Setup Admin User
        $admin = UserFactory::new()->withRole(Role::ADMIN)->create();
        $this->be($admin);
    }

    /** @test */
    public function article_route_works_fines()
    {
        $this->get(route('articles.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function admin_can_create_article()
    {
        $data = ArticleFactory::new()->getFormData();
        $this->post('/admin/articles', $data)
            ->assertSessionHasNoErrors()
            ->assertSessionHas('success');
        $this->assertDatabaseHas('articles', $data);
    }

    /** @test @dataProvider \Database\Factories\ArticleFactory::InvalidDataProvider() */
    public function create_articles_fails_for_following_datas($key)
    {
        $data = ArticleFactory::new()->getFormData();
        // Making Data Invalid to cause validation errors.
        $data = $this->resetData($data, $key);
        $this->expectException(ValidationException::class);
        $this->post('/admin/articles', $data);
    }
}
