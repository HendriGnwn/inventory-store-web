<?php

namespace App\Models;

use Carbon\Carbon;

class Transaction extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trx_number',
        'customer_id',
        'grand_total',
        'note',
        'status',
        'user_id',
    ];

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }

    public function customer() {
        return $this->hasOne(Customer::class);
    }

    public static function generateTrxNumber() {
        $currentDate = Carbon::now()->format('Y-m-d');

        $left = 'TRX-';
        $leftLen = strlen($left);
        $increment = 1;
        $padLength = 4;

        $last = self::where('trx_number', 'like', "%$currentDate%")
            ->orderBy('trx_number', 'desc')
            ->limit(1)
            ->first();

        if ($last) {
            $increment = (int) substr($last->trx_number, $leftLen, $padLength);
            $increment++;
        }

        $number = str_pad($increment, $padLength, '0', STR_PAD_LEFT);

        return $left . $number;
    }
}
