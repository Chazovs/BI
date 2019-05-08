<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRqcompaniesRqusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rqcompanies_rqusers', function (Blueprint $table) {
            $table->integer('company_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            //связь многие ко многим
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('rqcompanies_rqusers');
    }
}
