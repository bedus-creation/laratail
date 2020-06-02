<?php

namespace Tests\Factories;

use App\Domain\CMS\Models\Article;
use Christophrumpel\LaravelFactoriesReloaded\BaseFactory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ArticleFactory extends BaseFactory
{
    protected string $modelClass = Article::class;

    public function create(array $extra = []): Article
    {
        return parent::build($extra);
    }

    public function make(array $extra = []): Article
    {
        return parent::build($extra, 'make');
    }

    public function getDefaults(Faker $faker): array
    {
        $title = $faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $faker->paragraph(4),
            'type' => $faker->randomElement(['Article']),
            'status' => $faker->randomElement(['Published', 'Draft'])
        ];
    }

    public function getFormData(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(4),
            'type' => $this->faker->randomElement(['Article']),
            'status' => $this->faker->randomElement(['Published', 'Draft'])
        ];
    }

    public static function InvalidDataProvider()
    {
        return [
            ['title'], // Title is null
            [['title' => 'as']], // Title set 2 two characters
            [['title' => 'as', 'description' => 'this is description']], // Can set any keys
        ];
    }
}
