<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('bugs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('severity');
            $table->text('description')->nullable();
            $table->integer('state_id');
            $table->integer('user_id')->on('users');
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
        Schema::drop('bugs');
	}

}
