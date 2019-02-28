<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserTypeRepository;


class UserRepository
{
    protected $userTypeRepository;

    public function __construct()
    {
        $this->userTypeRepository = new UserTypeRepository();
    }

    public function getRandomClient()
    {
        return User::query()->where('user_type_id', $this->userTypeRepository->getClientId())->inRandomOrder()->get()->first();
    }

    public function getRandomDriver()
    {
        return User::query()->where('user_type_id', $this->userTypeRepository->getClientId())->inRandomOrder()->get()->first();
    }

    public function getAllDrivers()
    {
        return User::query()->where('user_type_id', $this->userTypeRepository->getDriverId())->get();
    }

    public function getAllClients()
    {
        return User::query()->where('user_type_id', $this->userTypeRepository->getClientId())->get();
    }
}