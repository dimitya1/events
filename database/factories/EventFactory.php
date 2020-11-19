<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entities\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'content' => $faker->text(400),
        'start_time' => \Carbon\Carbon::now()->addDays(rand(3, 10))->setHour(8)->minute(0)->second(0),
        'end_time' => \Carbon\Carbon::now()->addDays(rand(12, 20))->setHour(22)->minute(0)->second(0),
        'location' => $faker->city,
        'pdf' => $faker->word . '.pdf',
        'image' => $faker->word . 'png',
        'is_active' => rand(0, 1),
    ];
});
