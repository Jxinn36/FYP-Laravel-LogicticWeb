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
        Schema::create('advertisement', function (Blueprint $table) {
            $table->advID();
            $table->string('advName', 255);
            $table->string('advDesc', 255);
            $table->string('advImg')->nullable();
            $table->string('advCompany', 255);
            $table->string('companyRegisNo', 255);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);
           
             
            // Define primary key
            $table->primary('advID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement');
    }
};
