<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EspecialidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 4; $i++) {
            \DB::table('especialidads')->insert(array(
                'name' => $faker->unique()->randomElement(['Cardiología','Traumatología','Dermatología','Pediatría'])
            ));

        }
    }
}
