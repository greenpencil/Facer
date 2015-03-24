<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributePivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_attributes', function(Blueprint $table)
		{
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('attribute_id');
			$table->string('value');
			$table->timestamps();
		});

		Schema::table('users_attributes', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('attribute_id')->references('id')->on('attributes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_attributes');
	}

}
