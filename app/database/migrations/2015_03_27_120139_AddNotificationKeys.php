<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('poster_id')->references('id')->on('users');
			$table->foreign('hook_id')->references('id')->on('hooks');
			$table->foreign('post_id')->references('id')->on('posts');
			$table->foreign('comment_id')->references('id')->on('comments');
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
