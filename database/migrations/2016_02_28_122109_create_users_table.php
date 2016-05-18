<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->integer('id', true)->unsigned();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('locale')->default('en');
            $table->integer('provider_id')->unsigned()->nullable();
            $table->time('deadline')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
