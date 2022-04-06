<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    public function bogis() {
        return $this->hasMany(Bogi::class, 'train_id');
    }

    public function availableSeats($train_id) {
        $train = Train::findOrFail($train_id);

        $available = 0;
        foreach($train->bogis as $bogi) {
            $available += $bogi->availableSeats($bogi->id);
        }

        return $available;
    }
}
