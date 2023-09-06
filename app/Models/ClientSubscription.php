<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'subscription_id', 'consumables'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
