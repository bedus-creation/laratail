<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Aammui\LaravelTaggable\Models\Category;
use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => Str::slug($name, '-')
    ];
});
