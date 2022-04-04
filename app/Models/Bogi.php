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
}
