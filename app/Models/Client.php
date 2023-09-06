<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'branch_id', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function clientSubscriptions()
    {
        return $this->hasMany(ClientSubscription::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }


    public function clientPoint()
    {
        return $this->hasOne(ClientPoint::class);
    }
}
