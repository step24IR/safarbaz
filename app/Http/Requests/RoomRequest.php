<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'scale' => 'nullable',
            'capacity' => 'nullable',
            'extra_people' => 'nullable',
            'price_per_extra_people' => 'nullable',
            'price_per_holiday' => 'nullable',
            'price_per_non_holiday' => 'nullable',
            'city_id' => 'required',
            'village' => 'nullable',
            'number_of_rooms' => 'required',
            'number_of_bedrooms' => 'required',
            'number_of_bed_one' => 'required',
            'number_of_bed_two' => 'required',
            'number_of_wc_iranian' => 'required',
            'number_of_wc_frangi' => 'required',
            'number_of_tub_bathroom' => 'required',
            'number_of_normal_bathroom' => 'required',
            'textureAndView' => 'nullable',
            'address' => 'required',
            'exclusive' => 'nullable',
            'floor' => 'required',
            'description' => 'nullable',
        ];
    }
}
