<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the GuestBook homepage.
     *
     * @return Factory|View
    */
    public function index()
    {
        $userRepository = new UserRepository();

        $openOrders = 7;
        $completedOrders = 3;
        $drivers = count(UserResource::collection($userRepository->getAllDrivers()));
        $customers = count(UserResource::collection($userRepository->getAllClients()));

        return view('Admin.index', [
            'openOrders'      => $openOrders,
            'completedOrders' => $completedOrders,
            'drivers'         => $drivers,
            'customers'       => $customers,
        ]);
    }
}