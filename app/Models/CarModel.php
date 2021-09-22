<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends Model
{
    use HasFactory;

    public function car()
    {
        $this->belongsTo(Car::class);
    }
}
