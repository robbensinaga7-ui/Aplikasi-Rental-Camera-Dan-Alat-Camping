<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'customer_name',
        'product_id',
        'qty',
        'rent_date',
        'return_date',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
