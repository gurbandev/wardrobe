<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'discount_start' => 'datetime',
        'discount_end' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->full_name_tm) . '-' . str()->random(10);
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function color()
    {
        return $this->belongsTo(AttributeValue::class, 'color_id');
    }


    public function size()
    {
        return $this->belongsTo(AttributeValue::class, 'size_id');
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class)
            ->orderBy('id', 'desc');
    }


    public function values()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_value')
            ->orderByPivot('sort_order');
    }


    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_product')
            ->orderBy('id', 'desc');
    }


    public function isDiscount()
    {
        if ($this->discount_percent > 0 and $this->discount_start <= Carbon::now()->toDateTimeString() and $this->discount_end >= Carbon::now()->toDateTimeString()) {
            return true;
        } else {
            return false;
        }
    }


    public function getDiscountPercent()
    {
        if ($this->isDiscount()) {
            return $this->discount_percent;
        } else {
            return 0;
        }
    }


    public function getPrice()
    {
        return round($this->price * (1 - $this->getDiscountPercent() / 100), 1);
    }


    public function getFullName()
    {
        if (app()->getLocale() == 'en') {
            return $this->full_name_en ?: $this->full_name_tm;
        } else {
            return $this->full_name_tm;
        }
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
