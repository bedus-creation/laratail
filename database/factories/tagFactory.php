<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Aammui\LaravelTaggable\Models\Tag;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
