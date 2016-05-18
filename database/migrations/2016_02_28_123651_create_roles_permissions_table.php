<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

class CreateRolesPermissionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->integer('id', true)->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles_permissions');
    }

}
