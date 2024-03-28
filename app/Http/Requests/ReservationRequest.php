<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'number' => 'required',
            'room_id' =>'required',
            'start_time' =>'required',
            'end_time' =>'required',
            'is_pay' =>'nullable',
            'description' =>'nullable',
        ];
    }
}
