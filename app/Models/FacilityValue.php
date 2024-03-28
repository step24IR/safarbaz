<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityValue extends Model
{
    use HasFactory;

    protected $fillable = ['room_id' , 'facility_id' , 'value'];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
