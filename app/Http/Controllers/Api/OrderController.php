<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderPost;
use App\Http\Resources\OrderResource;
use App\Repositories\AddressRepository;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(OrderPost $request)
    {
        $userRepository = new UserRepository();
        $orderRepository = new OrderRepository();
        $addressRepository = new AddressRepository();

        if(!$request->address_id) {
            $addressId = $addressRepository->create($request->all())->id;
        } else {
            $addressId = $request->address_id;
        }

        $driverId = $userRepository->getRandomDriver()->id;

        $order = $orderRepository->create([
            'user_id' => Auth::user()->id,
            'address_id' => $addressId,
            'driver_id' => $driverId,
            'delivery_date' => $request->delivery_date,
            'delivery_start_time' => $request->delivery_start_from,
            'delivery_end_time' => $request->delivery_end_to,
        ]);

        return new OrderResource($order);
    }
}
