<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerPracticeAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_practice_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lawyers_id');
            $table->unsignedBigInteger('practice_areas_id');
            $table->foreign('lawyers_id')->references('id')->on('lawyers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('practice_areas_id')->references('id')->on('practice_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyer_practice_areas');
    }
}
