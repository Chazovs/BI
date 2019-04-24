<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->integer('parent_id')->default(0);
            $table->string('logo')->default('/img/default/dot.png');
            $table->text('description_full', 4000);//не больше 4000 символов
            $table->string('description_short');
            $table->string('author');
            $table->integer('company_id');
            $table->integer('chart_id')->default('0');
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
        Schema::dropIfExists('dots');
    }
}
