<?php

namespace App\Models;

class OrderDetail extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'item_id',
        'qty',
        'price',
        'purchase_total',
    ];

    public function order() {
        return $this->hasOne(Order::class);
    }

    public function item() {
        return $this->hasOne(Item::class);
    }
}
