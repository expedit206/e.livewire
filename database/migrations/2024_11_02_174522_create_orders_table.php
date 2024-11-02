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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->decimal('grand_total', 10, 2)->nullable();
            $table->decimal('payment_method')->nullable();
            $table->decimal('payment_status')->nullable();
            $table->enum('status', ['new', 'processing', 'completed', 'declined', 'canceled'])->default('pending ');
            $table->string('slug')->unique();
            $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
