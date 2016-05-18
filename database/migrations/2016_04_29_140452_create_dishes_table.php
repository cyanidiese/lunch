<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('calories')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('cost')->default(0);
            $table->string('image')->nullable();
            $table->string('name_en');
            $table->string('name_uk');
            $table->string('name_ru');
            $table->text('description_en');
            $table->text('description_uk');
            $table->text('description_ru');
            $table->boolean('is_active')->defult(1);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dishes');
    }
}
