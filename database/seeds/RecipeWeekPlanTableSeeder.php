<?php

use Illuminate\Database\Seeder;

class RecipeWeekPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_week_plan')->insert([
            [
                'recipe_id' => 1,
                'week_plan_id' => 1,
            ],
            [
                'recipe_id' => 1,
                'week_plan_id' => 2,
            ],
        ]);
    }
}
