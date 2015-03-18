<?php

use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Post::create(array(
				'user_id' => $faker->randomDigitNotNull,
				'text' => $faker->sentence($nbWords = 6)
			));
		}
	}

}