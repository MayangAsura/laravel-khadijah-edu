<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdulevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edulevels', function (Blueprint $table) {
            $table->id();
             //HAPUS TIMESTIME karena mau pake query builder   
            $table->string('name', 100); // string() = VARCHAR
            $table->text('desc')->nullable(); // boleh null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edulevels');
    }
}
