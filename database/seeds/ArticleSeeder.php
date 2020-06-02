<?php

use Illuminate\Database\Seeder;
use Tests\Factories\ArticleFactory;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleFactory::new()->times(5)->create();
    }
}
