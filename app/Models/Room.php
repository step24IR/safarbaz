<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory , SoftDeletes;

    public $table = 'rooms';

    protected $fillable = [
        'name', 'scale', 'capacity','extra_people','price_per_extra_people',
        'price_per_holiday', 'price_per_non_holiday', 'city_id', 'village',
        'number_of_rooms', 'number_of_bedrooms', 'number_of_bed_one',
        'number_of_bed_two', 'number_of_wc_iranian', 'number_of_wc_frangi',
        'number_of_tub_bathroom', 'number_of_normal_bathroom', 'textureAndView',
        'address', 'exclusive', 'floor', 'description',
    ];

    protected function PricePerExtraPeople():Attribute
    {
        return Attribute::make(
            get : fn ($value) => number_format($value , 0 , '/' , ',') . ' تومان',
            set : fn ($value) => str_replace( ',', '', $value),
        );
    }
    protected function PricePerHoliday():Attribute
    {
        return Attribute::make(
            get : fn ($value) => number_format($value , 0 , '/' , ',') . ' تومان',
            set : fn ($value) => str_replace( ',', '', $value),
        );
    }
    protected function PricePerNonHoliday():Attribute
    {
        return Attribute::make(
            get : fn ($value) => number_format($value , 0 , '/' , ',') . ' تومان',
            set : fn ($value) => str_replace( ',', '', $value),
        );
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function facilityValues()
    {
        return $this->hasMany(FacilityValue::class, 'room_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


//    public function guests()
//    {
//        return $this->belongsToMany(Guest::class, 'reservations');
//    }

}
