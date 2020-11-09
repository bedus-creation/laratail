<?php

namespace Database\Factories;

use App\Domain\CMS\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(4),
            'type' => $this->faker->randomElement(['Article']),
            'status' => $this->faker->randomElement(['Published', 'Draft'])
        ];
    }

    /**
     * Return success Form Data.
     *
     * @return array
     */
    public function getFormData(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(4),
            'type' => $this->faker->randomElement(['Article']),
            'status' => $this->faker->randomElement(['Published', 'Draft'])
        ];
    }

    /**
     * Return an InvalidDataProvider
     *
     * @return void
     */
    public static function InvalidDataProvider()
    {
        return [
            ['title'], // Title is null
            [['title' => 'as']], // Title set 2 two characters
            [['title' => 'as', 'description' => 'this is description']], // Can set any keys
        ];
    }
}
