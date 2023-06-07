<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Sale extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'sale';

    protected $fillable = [
        'vehicle_id','car_id','motor_id','stock_left','total_buy','total_sale'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id')->select(['year', 'color','price']);
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id')->select(['engine', 'seats','type']);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id')->select(['engine', 'suspension','transmition']);
    }
}
