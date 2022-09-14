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
            $table->text('amenities')->nullable();
            $table->text('furnish')->nullable();
            $table->double('totalPrice')->nullable();
            $table->boolean('isPaid')->default(0);
            $table->string('paidAt')->nullable();
            $table->enum('paymentMethod',['cash','paypal', 'flutter', 'paystack'])->nullable();
            $table->foreignUuid('property_uuid')->references('uuid')->on('properties')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->enum('level', ['new', 'renewal'])->default('new');
            $table->boolean('status')->default(1);
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