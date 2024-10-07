<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
     // Define the relationship with reservations
     public function reservations()
     {
         return $this->hasMany(Reservation::class);
     }
}
