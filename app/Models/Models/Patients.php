<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'admission_date', 'discharge_date', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

