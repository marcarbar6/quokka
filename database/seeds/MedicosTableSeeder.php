<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            \DB::table('medicos')->insert(array(
                'name' => $faker->firstName,
                'surname'  => $faker->name,
                'especialidad_id' => App\Especialidad::all()->random()->id
            ));

        }
    }
}
