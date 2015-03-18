<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FriendTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Friend::create(array(
				'user_id' => $faker->randomDigitNotNull,
				'user_id_2' => $faker->randomDigitNotNull,
			));
		}
	}

}