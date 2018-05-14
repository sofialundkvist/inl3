<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryRecipeTableSeeder::class);
        $this->call(IngridientsTableSeeder::class);
        $this->call(InstructionsTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(RecipeWeekPlanTableSeeder::class);
        $this->call(WeekPlansTableSeeder::class);
    }
}
