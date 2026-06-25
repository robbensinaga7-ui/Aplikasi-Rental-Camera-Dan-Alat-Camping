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
        Schema::create('transactions', function (Blueprint $table) {
      $table->id();

$table->foreignId('user_id')->constrained()->restrictOnDelete();
$table->foreignId('product_id')->constrained()->restrictOnDelete();

$table->integer('qty');
$table->date('rent_date');
$table->date('return_date');

$table->enum('status', ['dipinjam', 'menunggu_konfirmasi','dikembalikan', 'ditolak','dibatalkan']);

$table->bigInteger('price')->default(0);

$table->bigInteger('fine_late')->default(0);
$table->bigInteger('fine_damage')->default(0);
$table->bigInteger('fine_lost')->default(0);

$table->integer('late_days')->default(0);

$table->enum('condition', ['baik','rusak_ringan','rusak_berat','hilang'])->nullable();

$table->bigInteger('total_price')->default(0);

$table->enum('payment_status', ['pending','approved','rejected','dibatalkan'])->default('pending');
 $table->string('payment_proof')->nullable();
$table->timestamp('paid_at')->nullable();

$table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
