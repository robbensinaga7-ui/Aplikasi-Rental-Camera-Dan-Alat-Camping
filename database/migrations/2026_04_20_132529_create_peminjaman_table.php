<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
              // relasi ke product
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // data peminjaman
            $table->string('customer_name');
            $table->integer('qty');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();

            $table->string('status')->default('dipinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
