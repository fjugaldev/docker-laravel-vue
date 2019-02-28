<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\UserTypeResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $userType = Cache::remember('user.'.$this->user_type_id.'.type', 60, function (){
            return $this->user_type;
        });

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'lastname'          => $this->lastname,
            'user_type'         => new UserTypeResource($userType),
            'email'             => $this->email,
            'phone'             => $this->phone,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
