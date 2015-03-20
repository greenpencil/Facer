<?php
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create(array(
				'username' => $faker->userName,
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'password' => Hash::make($faker->word)
			));
		}
		User::create(array(
			'username' => 'greenpencil',
			'first_name' => 'Katie',
			'last_name' => 'Paxton-Fear',
			'email' => 'rstamac@gmail.com',
			'password' => Hash::make('testing123')
		));
	}

}