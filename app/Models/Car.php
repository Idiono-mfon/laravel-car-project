<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // protected $table = "cars"; //Overriding the default table

    // protected $primaryKey = "id"; //Overriding the default primary key

    // To allow mass assignment specify this
    // Specify the columns that you want to allow mass assignment

    protected $fillable = ['name', 'founded', 'description', 'image_path'];

    // To specify properties (columns) that should be hidden and not added as part of the payload
    //protected $hidden = ["id","name","founded","description"];

    // Blacklisting attributes
    //protected $hidden = ["updated_at"];

    // Whitelisting
    protected $visible = ["name", "founded", "description", 'image_path'];


    public function carModel()
    {
        return $this->hasMany(CarModel::class);
    }

    // Car Has many Engines through Models
    // Has Many Through relationship
    // Access Many related item (Engine) through a itermediate Item (CarModel)
    public function engines()
    {
        return $this->hasManyThrough(Engine::class, CarModel::class, 'car_id', 'model_id');
        // Specify the first model (has model) primary Key, and the second (through model primary key)
    }

    public function productionDate()
    {
        return $this->hasOneThrough(CarProductionDate::class, CarModel::class, 'car_id', 'model_id');

        //model_id: foreign key of "through" in has
        // car_id: foreign key of "The reference model --- Car" in the "through" model
    }

    public function products()
    {
        // All products (product type) that belongs to a particular car
        // Just like all courses that belongs to a particular student
        return $this->belongsToMany(Product::class);
    }
}
