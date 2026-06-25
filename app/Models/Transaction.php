<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
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
     'fine_late',
    'fine_damage',
    'fine_lost',
    'late_days',
'condition',
'total_price',
    'payment_status',
    'ktp_image',
    'payment_proof',
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
