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
        Schema::create('fotografers', function (Blueprint $table) {
            $table->id();
            $table->string('email_fotografer');
            $table->foreign('email_fotografer')
                  ->references('email')
                  ->on('users')
                  ->onDelete('cascade');
            $table->enum('job',['order','no_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografers');
    }
};
