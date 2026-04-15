<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    protected $table = 'returns';

    protected $fillable = [
        'transaction_id',
        'return_date',
        'fine'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
