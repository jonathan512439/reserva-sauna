<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reservation extends Model
{
    use HasFactory;
      // Define the relationships
      protected $fillable = [
        'user_id', 'room_id', 'start_time', 'end_time', 'status'
    ];
      public function user()
      {
          return $this->belongsTo(User::class);
      }

      public function room()
      {
          return $this->belongsTo(Room::class);
      }
}
