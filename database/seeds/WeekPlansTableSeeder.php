<?php

use Illuminate\Database\Seeder;

class WeekPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('week_plans')->insert([
            [
                'year' => 2018,
                'week_nr' => 1,
                'user_id' => 2
            ],
            [
                'year' => 2018,
                'week_nr' => 2,
                'user_id' => 2
            ],
        ]);
    }
}
