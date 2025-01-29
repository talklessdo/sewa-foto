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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking')->unique();
            $table->foreignId('cs_id')->constrained(
                table: 'users',indexName: 'bookings_cs_id'
            )->onDelete('cascade');
            $table->foreignId('fotograf_id')->constrained(
                table: 'users',indexName: 'bookings_fotograf_id'
            )->onDelete('cascade');
            $table->foreignId('editor_id')->constrained(
                table: 'users',indexName: 'bookings_editor_id'
            )->onDelete('cascade');
            $table->foreignId('paket_id')->constrained(
                table:'pakets', indexName: 'bookings_paket_id'
            )->onDelete('cascade');
            $table->date('booking_date');
            $table->string('payment')->nullable();
            $table->integer('durasi');
            $table->enum('status', ['pending', 'confirmed', 'canceled','waiting'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
