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
        Schema::create('carrier', function (Blueprint $table) {
            $table->carrierID();
            $table->string('fullName', 30);
            $table->string('phNum', 15);
            $table->string('ICnum', 15);
            $table->string('vehicleNum', 10);
            $table->unsignedBigInteger('orderID');
         //   $table->unsignedBigInteger('ratingID');
            $table->unsignedBigInteger('userID');
          //  $table->unsignedBigInteger('paymentID');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);

                // Define foreign key relationship
                $table->foreign('orderID')->references('orderID')->on('orders');
              //  $table->foreign('ratingID')->references('ratingID')->on('rating');
                $table->foreign('userID')->references('userID')->on('user');
                //$table->foreign('paymentID')->references('paymentID')->on('payment');
            
                // Define primary key
                $table->primary('carrierID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['orderID']);
        });

        Schema::table('rating', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['ratingID']);
        });

        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['userID']);
        });

        // Schema::table('payment', function (Blueprint $table) {
        //     // Drop foreign key before dropping the table
        //     $table->dropForeign(['paymentID']);
        // });

        Schema::dropIfExists('carrier');
    }
};
