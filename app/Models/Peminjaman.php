<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
     protected $table = 'peminjaman';

     protected $fillable = [
          'pelanggan_id',
          'product_id',
          'tanggal_pinjam',
          'tanggal_kembali',
          'status',
     ];
}
