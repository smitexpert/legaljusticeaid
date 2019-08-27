<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_courts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lawyers_id');
            $table->unsignedBigInteger('courts_id');
            $table->foreign('lawyers_id')->references('id')->on('lawyers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courts_id')->references('id')->on('courts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lawyer_courts');
    }
}
