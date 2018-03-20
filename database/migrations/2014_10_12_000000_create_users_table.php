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
            $table->increments('id_user');
            $table->string('name', 64);
            $table->string('nickname', 16);
            $table->smallInteger('born_city');
            $table->dateTime('born_date');
            $table->text('address');
            $table->string('institution', 128);
            $table->string('jobs', 128);
            $table->smallInteger('education');

            $table->mediumInteger('telephone');
            $table->mediumInteger('handphone');

            $table->string('cp_whatsapp', 16)->nullable();
            $table->string('cp_bbm', 16)->nullable();
            $table->string('cp_line', 16)->nullable();
            $table->string('cp_facebook', 16)->nullable();
            $table->string('cp_twitter', 16)->nullable();
            $table->string('cp_instagram', 16)->nullable();
            $table->string('email', 64);

            $table->mediumInteger('country');
            $table->ipAddress('visitor');
            $table->macAddress('device');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
