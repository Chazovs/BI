<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dot_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dot_id')->unsigned();
            $table->foreign('dot_id')->references('id')->on('dots')->onDelete('cascade');
            $table->integer('responsible_id')->unsigned(); //ответственный
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->integer('company_id')->unsigned();
           
           /* $table->foreign('company_id')->references('id')->on('companies');*/
            $table->string('name', 200);
            $table->text('problem', 4000); //в чем суть проблемы
            $table->text('description', 4000); //как исправить
            $table->date('deadline');
            $table->string('status')->default('1');//на каком этапе находится
            $table->integer('author_id')->unsigned();//кто создал 
            $table->foreign('author_id')->references('id')->on('users');
            $table->integer('from_user_id')->default('0');// задача создана на основании идеи покупателя
            /*$table->foreign('from_user_id')->references('id')->on('users');*/
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
        Schema::dropIfExists('dot_tasks');
    }
}
