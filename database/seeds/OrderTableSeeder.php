<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Repositories\AddressRepository;
use App\Repositories\UserRepository;

class OrderTableSeeder extends Seeder
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::query()->truncate();
        $faker = Faker::create('es_ES');
        $addressRepository = new AddressRepository();
        $userRepository = new UserRepository();

        foreach (range(1,10) as $index) {
            $deliveryTimeFrom      = $faker->dateTimeThisMonth();
            $deliveryTimeTo        = $this->getDeliveryTimeTo($deliveryTimeFrom);
            $deliveryDateTimestamp = $int= mt_rand(1544891156,1552667156);
            $deliveryDate          = date('Y-m-d', $deliveryDateTimestamp);

            DB::table('order')->insert([
                [
                    'user_id'            => $userRepository->getRandomClient()->id,
                    'address_id'         => $addressRepository->getRandom()->id,
                    'driver_id'          => $userRepository->getRandomDriver()->id,
                    'delivery_date'      => $deliveryDate,
                    'delivery_time_from' => $deliveryTimeFrom,
                    'delivery_time_to'   => $deliveryTimeTo,
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ],
            ]);
        }
    }

    protected function getDeliveryTimeTo($deliveryTimeFrom) {
        $deliveryTimeTo = DateTime::createFromFormat(self::DATE_FORMAT, $deliveryTimeFrom->format(self::DATE_FORMAT));
        $numHoursInTimeRange = rand(1, 8);
        $interval = new DateInterval('PT'.$numHoursInTimeRange.'H');
        $deliveryTimeTo->add($interval);

        return $deliveryTimeTo;
    }

}
