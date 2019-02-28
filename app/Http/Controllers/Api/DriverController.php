<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function orders(User $driver)
    {
        $orderRepository = new OrderRepository();
        $orders = $orderRepository->getOrdersByDriver($driver->id);

        return OrderResource::collection($orders);
    }

    public function order(User $driver, Order $order)
    {
        $orderRepository = new OrderRepository();
        $order = $orderRepository->getDriverOrder($driver->id, $order->id);

        return OrderResource::collection($order);
    }

    public function ordersByDate(User $driver, $date = null)
    {
        if(!$date)
        {
            $date = Carbon::today()->format('Y-m-d');
        } else {
            Validator::make(['date' => $date], [
                'date' => 'date|date_format:Y-m-d',
            ])->validate();
        }

        $orderRepository = new OrderRepository();
        $orders = $orderRepository->getOrdersByDriverAndDate($driver->id, $date);

        return OrderResource::collection($orders);
    }

}
