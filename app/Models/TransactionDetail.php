<?php

namespace App\Models;

class TransactionDetail extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'item_id',
        'qty',
        'price',
        'total_price',
    ];

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }

    public function item() {
        return $this->hasOne(Item::class);
    }
}
