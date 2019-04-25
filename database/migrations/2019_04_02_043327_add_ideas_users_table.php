<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Эта таблица содержит идеи пользователей по поводу других компаний
 */
class AddIdeasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('status');
            $table->string('name');
            $table->text('situation');//тускло светит проектор
            $table->text('problem');//я не вижу презентацию (чем это лично тебе мешает)
            $table->text('decision');//решение: купить новую лампочку для проектора
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
        Schema::dropIfExists('ideas');
    }
}
