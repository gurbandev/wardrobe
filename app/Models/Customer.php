<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    const UPDATED_AT = null;


    public function orders()
    {
        return $this->hasMany(Order::class)
            ->orderBy('id', 'desc');
    }


    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class)
            ->orderBy('id', 'desc');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'customer_product')
            ->orderBy('id', 'desc');
    }
}
