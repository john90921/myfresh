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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id');
            $table->string('product_name'); //product name at time of order
            $table->foreignId('package_id');
            $table->string('package_name'); //package details at time of order
            $table->float('package_price'); //package price at time of order
            $table->string('package_description'); //package details at time of order
            $table->integer('quantity');
            $table->float('total_amount');
            $table->string('name'); // customer's name
            $table->string('phone');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('notes')->nullable(); // additional notes
            $table->string('status')->default('pending'); // pending, processing, completed, cancelled
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
