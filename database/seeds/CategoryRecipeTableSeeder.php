<?php

use Illuminate\Database\Seeder;

class CategoryRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_recipe')->insert([
            [
                'category_id' => 3,
                'recipe_id' => 1
            ]
        ]);
    }
}
