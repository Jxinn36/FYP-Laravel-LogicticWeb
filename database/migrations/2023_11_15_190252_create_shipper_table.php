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
        Schema::create('shipper', function (Blueprint $table) {
            $table->shipperID ();
            $table->string('fullName', 30);
            $table->string('phNum', 15);
            $table->string('address', 255);

            $table->string('remark', 255) ->nullable();
            $table->integer('postcode')->length(5);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->unsignedBigInteger('orderID');
            $table->unsignedBigInteger('paymentID');
            $table->unsignedBigInteger('userID');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);
           
            $table->foreign('orderID')->references('orderID')->on('orders');
            $table->foreign('paymentID')->references('paymentID')->on('payment');
            $table->foreign('userID')->references('userID')->on('user');

            $table->primary('shipperID ');


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

        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['orderID']);
        });

        Schema::table('payment', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['paymentID']);
        });

        Schema::dropIfExists('shipper');
    }
};
