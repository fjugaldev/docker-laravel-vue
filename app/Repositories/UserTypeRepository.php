<?php

namespace App\Repositories;
use App\Models\UserType;
use Illuminate\Support\Facades\Cache;


class UserTypeRepository
{
    public function getClientId()
    {
        return Cache::rememberForever('clientUserTypeId', function() {
            return UserType::query()->where('name', 'client')->first()->id;
        });
    }

    public function getDriverId()
    {
        return Cache::rememberForever('driverUserTypeId', function() {
            return UserType::query()->where('name', 'driver')->first()->id;
        });
    }

}