<?php

use Faker\Factory as Faker;

class AttributeTableSeederTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

			AttributeTableSeeder::create([
				'name' => 'Location',
				'profile_text' => 'Lives in %LOCATION%',
				'description' => 'Where do you live?',
				'icon' => 'Where do you live?',
			]);
	}

}