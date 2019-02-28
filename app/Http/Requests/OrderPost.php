<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'address_id'          => 'required_without:street_name,street_number,province,postal_code,country|exists:address,id',
            'delivery_date'       => 'required|date|after:today|date_format:Y-m-d',
            'delivery_start_from' => 'date_format:H:i',
            'delivery_end_to'     => 'date_format:H:i|after:delivery_start_from',
            'street_name'         => 'required_without:address_id|string',
            'street_number'       => 'required_without:address_id|numeric',
            'province'            => 'required_without:address_id|string',
            'country'             => 'required_without:address_id|string',
            'postal_code'         => 'numeric'
        ];

    }
}
