<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            // CARA 2 (FOREIGN KEY)
            $table->foreignId('edulevels_id')->constrained('edulevels')->onDelete('cascade')->onUpdate('cascade');
            // CARA 1
            // $table->bigInteger('edulevels_id')->unsigned(); // utk FOREIGN KEY ke ID edulevel 
            $table->string('name', 100);
            $table->integer('student_price')->nullable();
            $table->tinyInteger('student_max')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        //CARA 1
        // Schema::table('programs', function (Blueprint $table) {
        //     $table->foreign('edulevels_id')->references('id')->on('edulevels')
        //         ->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
