<?php

use Illuminate\Database\Seeder;

class InstructionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructions')->insert([
            [
                'recipe_id' => 1,
                'step_no' => 1,
                'description' => 'Skala och finhacka lök och vitlök.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 2,
                'description' => 'Kärna ur och grovhacka paprikan.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 3,
                'description' => 'Hetta upp en panna med smör eller olja och fräs mjuk på inte
                alltför hög värme och utan att löken tar färg.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 4,
                'description' => 'Tillsätt spenaten, något tinad.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 5,
                'description' => 'Låt puttra i 3–4 minuter.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 6,
                'description' => 'Tillsätt krossade tomater, tomatpuré, buljong och vatten. Låt puttra i ca 10 minuter.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 7,
                'description' => 'Smaka av med flingsalt, peppar, timjan eller oregano.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 8,
                'description' => 'Smält smöret till bechamelsåsen i en kastrull.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 9,
                'description' => 'Vispa ner mjölet.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 10,
                'description' => 'Häll på mjölken under vispning och låt koka upp.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 11,
                'description' => 'Smaka av med salt och peppar.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 12,
                'description' => 'Smörj en ugnsfast form med smör.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 13,
                'description' => 'Varva sedan tomat- och spenatsås, lasagneplattor, bitar av mozzarella och bechamelsås.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 14,
                'description' => 'Översta lagret ska vara bechamelsås.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 15,
                'description' => 'Hacka de soltorkade tomaterna och strö över gratängen.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 16,
                'description' => 'Toppa med den rivna parmesanosten. Gratinera lasagnen i 225–250 grader varm ugn i 30–35 minuter.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 17,
                'description' => 'Späd med någon deciliter vatten under tiden om den känns torr.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 18,
                'description' => 'Täck med folie mot slutet om den blir för bränd.',
            ],
            [
                'recipe_id' => 1,
                'step_no' => 19,
                'description' => 'Servera den krämiga lasagnen med en sallad.',
            ],

        ]);
    }
}
