<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'point'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
