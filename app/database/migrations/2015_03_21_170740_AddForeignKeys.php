<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('post_id')->references('id')->on('posts');
		});

		Schema::table('posts', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::table('likes', function($table) {
			$table->foreign('post_id')->references('id')->on('posts');
			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::table('friends', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('user_id_2')->references('id')->on('users');
		});

		Schema::table('frequests', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('user_id_2')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
