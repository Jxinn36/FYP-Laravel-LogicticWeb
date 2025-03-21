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
        Schema::create('payment', function (Blueprint $table) {
            $table->paymentID();
            $table->decimal('totalBill', 10, 2);
            $table->unsignedBigInteger('shipperID ');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);
           
            $table->foreign('shipperID')->references('shipperID')->on('shipper');

            $table->primary('paymentID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['userID']);
        });

        Schema::table('shipper', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['shipperID']);
        });

        Schema::dropIfExists('payment');
    }
};
