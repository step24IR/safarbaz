<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory , SoftDeletes;
    public bool $ignoreMutator = false;

    protected $fillable = [
        'guest_id',
        'room_id',
        'end_time',
        'start_time',
        'number_of_person',
        'description',
        'is_pay',
    ];

    protected function startTime():Attribute
    {
        return Attribute::make(
            get : fn ($value) => verta($value)->format('Y-m-d'),
            set : function ($value){
                if($this->ignoreMutator){
                    return $value;
                }
                else
                {
                    return Verta::parse($value)->datetime()->format('Y-m-d');
                }
            }
        );
    }

    protected function endTime():Attribute
    {
        return Attribute::make(
            get : fn ($value) => verta($value)->format('Y-m-d'),
            set : function ($value){
                if($this->ignoreMutator){
                    return $value;
                }
                else
                {
                    return Verta::parse($value)->datetime()->format('Y-m-d');
                }
            }
        );
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
