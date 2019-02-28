<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserTypeRepository;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DriverUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypeRepository = new UserTypeRepository();
        $driverUserTypeId = $userTypeRepository->getDriverId();
        $faker = Faker::create('es_ES');

        foreach (range(1,10) as $index) {
            DB::table('user')->insert([
                [
                    'name'              => $faker->name,
                    'lastname'          => $faker->lastName,
                    'user_type_id'      => $driverUserTypeId,
                    'email'             => $faker->email,
                    'phone'             => $faker->phoneNumber,
                    'email_verified_at' => now(),
                    'password'          => Hash::make('asd123'),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ],
            ]);
        }
    }
}
