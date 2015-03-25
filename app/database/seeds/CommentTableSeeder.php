<?php

use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Comment::create(array(
				'text' => $faker->sentence($nbWords = 6)
			));
		}
	}

}