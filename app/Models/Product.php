<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    public function car()
    {
        // The Single One-to-Many relationship is established here
        return $this->belongsToMany(Car::class);
    }
}
