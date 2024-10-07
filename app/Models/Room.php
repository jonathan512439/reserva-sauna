<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name'];  // Otros atributos de la sala que tengas

     // Define the relationship with reservations
     public function reservations()
     {
         return $this->hasMany(Reservation::class);
     }
}
