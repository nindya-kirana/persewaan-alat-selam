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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->decimal('total_sewa', 12, 2);
            $table->decimal('total_denda', 12, 2)->default(0);
            $table->decimal('total_bayar', 12, 2);
            $table->enum('metode', ['cash', 'transfer', 'qris'])->default('cash');
            $table->enum('status', ['pending', 'lunas'])->default('pending');
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
