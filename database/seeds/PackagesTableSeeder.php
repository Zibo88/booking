<?php

use Illuminate\Database\Seeder;
use App\Package;
use Faker\Generator as Faker;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_package = new Package();

        $new_package->title = $faker->sentence();
        $new_package->description = $faker->text();
        $new_package->departure = $faker->dateTime();
        $new_package->return = $faker->dateTime();
        $new_package->price =  $faker->numberBetween(0, 9999);
        $new_package->save();
    }
}
