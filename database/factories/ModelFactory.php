<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


// factory(App\Inbox::class, 3)->create();

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Inbox::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'subject' => $faker->title,
        'body' => $faker->paragraph,
        'user_id' => 1,
        'from_user' => 2,
    ];
});
