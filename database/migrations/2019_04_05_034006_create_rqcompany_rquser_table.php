<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRqcompanyRquserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rqcompany_rquser', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('rqcompany_rquser');
    }
}
