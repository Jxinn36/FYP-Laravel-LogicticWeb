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
            $table->orderID();
            $table->unsignedBigInteger('shipperID');
            $table->string('pickAddress', 255);
            $table->string('dropAddress', 255);
            $table->string('remark', 255) ->nullable();
            $table->unsignedBigInteger('vehicleID');
            $table->decimal('amount', 10, 2);
            $table->enum('deliveryStatus', ['pending', 'deliver', 'receive'])->default('pending');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);
           
            $table->foreign('shipperID')->references('shipperID')->on('shipper');
            $table->foreign('vehicleID')->references('vehicleID')->on('vehicle');

            $table->primary('orderID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('shipper', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['shipperID']);
        });

        Schema::table('vehicle', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['vehicleID']);
        });

        Schema::dropIfExists('orders');
    }
};
