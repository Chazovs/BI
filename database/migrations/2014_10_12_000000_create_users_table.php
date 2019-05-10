<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('real_name', 120);
            $table->string('real_lastname', 200);
            $table->string('hh', 200)->default('');;
            $table->string('about', 300)->default('');;
            $table->string('profession', 100)->default('');;
            $table->string('experience', 100)->default('');;
            $table->string('city', 100)->default('');
            $table->string('look_for_work', 1)->default('N');
            $table->string('global_permission')->default('user');//companyAdmin user superAdmin
            $table->string('theme')->default('default');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();
            $table->string('avatar')->default('/img/default/user.png');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
