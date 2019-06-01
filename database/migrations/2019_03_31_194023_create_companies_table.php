<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('name');
            $table->string('description', 200)->default('');
            $table->string('about', 6000)->default('');
            $table->string('email', 100)->default('');
            $table->string('slogan')->default('');
            $table->string('chart_data')->default('0');
            $table->string('city')->default('');
            $table->string('logo')->default('');
            $table->string('front_image')->default('/img/main/9.png');
            $table->string('adress')->default('');
            $table->string('phone')->default('');
            $table->string('site')->default('');
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
        Schema::dropIfExists('companies');
    }
}
