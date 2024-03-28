<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name',
        'number',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


//    public function rooms()
//    {
//        return $this->belongsToMany(Room::class, 'reservations');
//    }
}
