<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FriendRequestTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            FriendRequest::create(array(
                'user_id' => 11,
                'user_id_2' => $faker->randomDigitNotNull,
            ));
        }
    }

}