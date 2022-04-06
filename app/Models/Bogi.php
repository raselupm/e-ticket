<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bogi extends Model
{
    use HasFactory;

    public function seats() {
        return $this->hasMany(Seat::class, 'bogi_id');
    }

    public function availableSeats($bogi_id) {
        $bogi = Bogi::findOrFail($bogi_id);

        $seats = Seat::where('bogi_id', $bogi_id)->where('booked', 0)->get();

        return count($seats);
    }
}
