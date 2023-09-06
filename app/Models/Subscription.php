<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'service_id', 'description', 'vehicle_type', 'number_of_wash', 'discount', 'points_per_wash', 'type', 'additional_fees'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function clientSubscriptions()
    {
        return $this->hasMany(ClientSubscription::class);
    }
}
