<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'address';

    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    protected $fillable = [
        'street_name', 'street_number', 'postal_code', 'province', 'country', 'latitude', 'logintude',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
