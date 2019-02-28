<?php

namespace App\Repositories;
use App\Models\Address;


class AddressRepository
{
    public function getRandom()
    {
        return Address::query()->inRandomOrder()->get()->first();
    }
}