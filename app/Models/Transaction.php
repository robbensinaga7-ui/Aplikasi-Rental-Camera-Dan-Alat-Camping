<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   protected $fillable = [
    'product_id',
    'user_id',
    'qty',
    'rent_date',
    'return_date',
    'status',
    'price',
    'fine',
    'payment_status',
    'payment_proof',
    'is_paid',
    'paid_at'
];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
