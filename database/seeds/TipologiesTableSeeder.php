<?php

use Illuminate\Database\Seeder;
use App\Typology;

class TipologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipologies = [
            'All inclusive',
            'Mezza pensione',
            'Pensione completa',
        ];

        foreach ($tipologies as $typology) {
            
            $new_typology = new Typology();
            $new_typology->name = $typology;
            $new_typology->save();
        }
    }
}
