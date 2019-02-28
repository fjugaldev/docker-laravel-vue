<?php

namespace App\Repositories;


use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderRepository
{
    protected function ordersByDriver($id)
    {
        return Order::query()->where('driver_id', $id);
    }

    protected function orderByDriver($driver, $order)
    {
        return Order::query()->where('id', $order)->where('driver_id', $driver);
    }

    public function create($order)
    {
        return Order::query()->create($order);
    }

    public function getOrdersByDriver($id)
    {
        return Cache::remember("orders.driver.{$id}", $minutes = '5', function() use($id){
            if(Cache::has('orders.driver')) return Cache::has('orders.driver')->find($id);

            return $this->ordersByDriver($id)->get();
        });
    }

    public function getDriverOrder($driver, $order)
    {
        return Cache::remember("order.driver.{$driver}.{$order}", $minutes = '5', function() use($driver, $order){
            if(Cache::has("order.driver.{$driver}.{$order}")) return Cache::get("order.driver.{$driver}.{$order}");

            return $this->orderByDriver($driver, $order)->get();
        });
    }

    public function getOrdersByDriverAndDate($id, $date)
    {
        return Cache::remember("orders.driver.{$id}.date.{$date}", $minutes='5', function() use($id, $date)
        {
            if(Cache::has('orders.driver.{$id}.date')) return Cache::has('orders.driver.{$id}.date')->find($date);

            return $this->ordersByDriver($id)->where('delivery_date', $date)->get();
        });
    }

}