<?php

use Illuminate\Database\Seeder;

class IngridientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingridients')->insert([
            [
                'recipe_id' => 1,
                'title' => 'Pastaplattor',
                'amount' => 400,
                'unit' => 'g',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Gul lök',
                'amount' => 1,
                'unit' => 'st',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Vitlöksklyftor',
                'amount' => 2,
                'unit' => 'st',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Röd paprika',
                'amount' => 2,
                'unit' => 'st',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Smör eller olja att steka i',
                'amount' => null,
                'unit' => null,
            ],
            [
                'recipe_id' => 1,
                'title' => 'Fryst spenat',
                'amount' => 500,
                'unit' => 'g',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Krossade tomater',
                'amount' => 500,
                'unit' => 'g',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Tomatpuré',
                'amount' => 0.5,
                'unit' => 'dl',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Grönsaksbuljongtärning',
                'amount' => 1,
                'unit' => 'st',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Vatten',
                'amount' => 1,
                'unit' => 'dl',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Flingsalt och nymalen svartpeppar',
                'amount' => null,
                'unit' => null,
            ],
            [
                'recipe_id' => 1,
                'title' => 'Torkad timjan eller oregano',
                'amount' => 1,
                'unit' => 'msk',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Mozzarellaostar (á 125 g)',
                'amount' => 2,
                'unit' => 'st',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Marinerade soltorkade tomater',
                'amount' => 1,
                'unit' => 'dl',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Finriven parmesanost',
                'amount' => 1,
                'unit' => 'dl',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Smör',
                'amount' => 2,
                'unit' => 'msk',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Vetemjöl',
                'amount' => 3,
                'unit' => 'msk',
            ],
            [
                'recipe_id' => 1,
                'title' => 'Mjölk',
                'amount' => 5,
                'unit' => 'dl',
            ],
        ]);
    }
}
