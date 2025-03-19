<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up(): void
    {
        Schema::create('role', function (Blueprint $table) {
            $table->roleID();
            $table->string('roleName', 30);
            $table->tinyInteger('deleted')->default(0);
            $table->dateTime('created_at');
             
            // Define primary key
            $table->primary('roleID');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role');
    }
}
