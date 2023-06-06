<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Car extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'car';

    protected $fillable = [
        'engine', 'seats', 'type','vehicle_id'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
