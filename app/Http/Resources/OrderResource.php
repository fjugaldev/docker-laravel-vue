<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $client = Cache::remember('client.'.$this->user_id, 60, function (){
            return $this->user;
        });
        $driver = Cache::remember('driver.'.$this->driver_id, 60, function (){
            return $this->driver;
        });
        $address = Cache::remember('address.'.$this->address_id, 60, function (){
            return $this->address;
        });

        return [
            'id'                  => $this->id,
            'client'              => new UserResource($client),
            'driver'              => new UserResource($driver),
            'delivery_date'       => $this->delivery_date,
            'delivery_start_from' => $this->delivery_start_from,
            'delivery_end_to'     => $this->delivery_end_to,
            'address'             => new AddressResource($address),
        ];

    }
}
