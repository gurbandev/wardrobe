<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
