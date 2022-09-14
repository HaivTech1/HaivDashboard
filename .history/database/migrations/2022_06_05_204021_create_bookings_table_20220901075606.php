<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('passport');
            $table->boolean('amenities')->default(0);
            $table->text('furnish');
            $table->double('totalPrice')->nullable();
            $table->boolean('isPaid')->default(0);
            $table->string('paidAt')->nullable();
            $table->enum('paymentMethod',['cash','paypal', 'flutter', 'paystack'])->nullable();
            $table->foreignUuid('property_uuid')->references('uuid')->on('properties')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}