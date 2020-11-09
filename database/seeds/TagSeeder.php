<?php

use Aammui\LaravelTaggable\Models\Tag;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagFactory::new()->times(5)->create();
    }
}
