<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'title' => 'Mozzarella- och spenatlasagne',
                'portions_no' => 6,
                'user_id' => 2
            ]
        ]);
    }
}
