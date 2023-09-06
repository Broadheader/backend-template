<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id','cashier_id', 'car_id', 'branch_id', 'transaction_no', 'amount', 'items',
        'mode_of_payment', 'status', 'point_gained'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class, 'cashier_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
