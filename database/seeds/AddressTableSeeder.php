<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        foreach (range(1,10) as $index) {
            DB::table('address')->insert([
                [
                    'street_name'   => $faker->streetName,
                    'street_number' => $faker->buildingNumber,
                    'postal_code'   => $faker->postcode,
                    'province'      => $faker->city,
                    'country'       => $faker->country,
                    'latitude'      => $faker->latitude,
                    'longitude'     => $faker->longitude,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            ]);
        }
    }
}
