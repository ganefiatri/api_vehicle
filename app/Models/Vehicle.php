<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'Vehicle';

    protected $fillable = [
        'year', 'color', 'price','stock'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function motors()
    {
        return $this->hasMany(Motor::class);
    }
}
