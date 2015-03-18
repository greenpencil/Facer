<?php

use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Comment::create(array(
				'user_id' => $faker->randomDigitNotNull,
				'post_id' => $faker->randomDigitNotNull,
				'text' => $faker->sentence($nbWords = 6)
			));
		}
	}

}