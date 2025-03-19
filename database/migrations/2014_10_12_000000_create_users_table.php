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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('userID');
            $table->string('username',30);
            $table->string('password');
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('roleID')->nullable(false);
            $table->rememberToken(); 
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);
            
          //  $table->timestamps();

            // Define foreign key relationship
            $table->foreign('roleID')->references('roleID')->on('role');
            
            // Define primary key
            $table->primary('userID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role', function (Blueprint $table) {
            // Drop foreign key before dropping the table
            $table->dropForeign(['roleID']);
        });

        Schema::dropIfExists('users');
    }
};
