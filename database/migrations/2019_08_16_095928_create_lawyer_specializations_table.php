<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_specializations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lawyers_id');
            $table->unsignedBigInteger('specializations_id');
            $table->foreign('lawyers_id')->references('id')->on('lawyers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('specializations_id')->references('id')->on('specializations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lawyer_specializations');
    }
}
