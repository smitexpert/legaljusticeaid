<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug', 30)->default('mysite');
            $table->string('name', 30);
            $table->string('phone', 30);
            $table->string('email', 30);
            $table->string('address');
            $table->string('description');
            $table->string('logo')->default('default-logo.jpg');
            $table->string('footer_logo')->default('default-footer-logo.jpg');
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
        Schema::dropIfExists('sites');
    }
}
