<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
         'user_id',
    'product_id',
    'qty',
    'rent_date',
    'return_date',
    'status',
    'price',
    'fine',
    'is_paid',
    'paid_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
