<?php

use Aammui\LaravelTaggable\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryFactory::new()->times(5)->create();
    }
}
