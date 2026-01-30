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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking', 50)->unique();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->decimal('total_bayar')->nullable();
            $table->decimal('denda', 12, 2)->default(0);
            $table->enum('status', ['booking', 'diambil','kembali', 'selesai', 'cancel'])->default('booking');
            $table->enum('payment_status', ['belum_bayar', 'sudah_bayar'])->default('belum_bayar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
