<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviceAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('advice_id');
            $table->unsignedBigInteger('user_id');
            $table->text('answer');
            $table->boolean('is_best')->default(false);
            $table->boolean('status')->default(true);
            $table->foreign('advice_id')->references('id')->on('advices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('advice_answers');
    }
}
