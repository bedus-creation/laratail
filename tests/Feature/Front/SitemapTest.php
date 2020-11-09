<?php

namespace Tests\Feature\Front;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\ArticleFactory;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        ArticleFactory::new()->create();
    }

    /** @test */
    public function get_sites_returns_200_status()
    {
        $this->get('/sitemap.xml')
            ->assertStatus(200);
    }

    /** @test */
    public function article_sitemap_returns_200_status()
    {
        $this->get('/article-sitemap.xml')
            ->assertStatus(200);
    }
}
