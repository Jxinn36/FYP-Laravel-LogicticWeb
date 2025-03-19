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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->vehicleID ();
            $table->enum('type', ['car', 'motorcycle', 'lorry'])->default('car');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('deleted')->default(0);

            $table->primary('vehicleID ');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
