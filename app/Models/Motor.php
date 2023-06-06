<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Motor extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'motor';

    protected $fillable = [
        'engine', 'suspension', 'transmition','vehicle_id'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
