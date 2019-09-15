<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('practicearea_id');
            $table->unsignedBigInteger('advice_id');
            $table->foreign('practicearea_id')->references('id')->on('practice_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('advice_id')->references('id')->on('advices')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('advice_categories');
    }
}
