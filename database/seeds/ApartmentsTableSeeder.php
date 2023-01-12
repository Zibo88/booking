<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = [
            'Hotel',
            'Ostello',
            'B&B',
            'Appartamento',
        ];

        foreach ($apartments as  $apartments) {
            $new_apartment = new Apartment();

            $new_apartment->name =  $apartments;
            $new_apartment->city = $faker->city();
            $new_apartment->address = $faker->address();
            $new_apartment->country = $faker->country();
            $new_apartment->save();
        }
    }
}
