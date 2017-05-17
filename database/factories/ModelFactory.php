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


// factory(App\Inbox::class, 30)->create();

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Inbox::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'id' => $faker->unique()->numberBetween(1,31),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'subject' => $faker->title,
        'body' => $faker->text,
        'user_id' => $faker->numberBetween(2,30),
        'to_user' => $faker->numberBetween(2,30),
    ];
});

// factory(App\User::class, 30)->create();

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'id' => $faker->unique()->numberBetween(1,31),
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123123123'),
        'activated' => 1,
        'type' => $faker->numberBetween(2,3),
        'city' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'rate' => $faker->numberBetween(0,5),
    ];
});
// factory(App\Profile::class, 30)->create();

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'id' => $faker->unique()->numberBetween(1,31),
        'gen_exp' => $faker->numberBetween(2,10),
        'sch_exp' => $faker->numberBetween(2,10),
        'teach_time' => $faker->numberBetween(2,10),
        'teach_hours' => $faker->numberBetween(1,4),
        'hour_rate' => $faker->numberBetween(2,3),
        'intro' => $faker->text(500),
        'photo' => 'profile.png',
        'hear' => 'من خلال صديق',
        'level' => $faker->numberBetween(2,3),
        'lang' => 'arabic',
        'dbirth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'statue' => 1,
        'gender' => $faker->numberBetween(1,2),
        'age' => $faker->numberBetween(10,50),
        'specialty' => $faker->numberBetween(1,7),
        'school' => $faker->numberBetween(2,3),
        'user_id' => $faker->unique()->numberBetween(1,31),
    ];
});

// factory(App\Enquiry::class, 30)->create();

$factory->define(App\Enquiry::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'id' => $faker->unique()->numberBetween(1,31),
        'user_id' => $faker->numberBetween(1,30),
        'total_hours' => $faker->numberBetween(1,50),
        'preferred_time' => $faker->numberBetween(1,4),
        'material' => $faker->numberBetween(1,7),
        'lng' => $faker->longitude(-180, 180),
        'lat' => $faker->latitude(-90, 90),
        'subject' => $faker->numberBetween(1,7),
        'target' => $faker->text(500),
        'comment' => $faker->text(500),
        'statue' => 1,
        'teacher_id' => 0,
        'applicant_id' => $faker->numberBetween(1,30),
    ];
});

// factory(App\Applicant::class, 30)->create();

$factory->define(App\Applicant::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\ar_SA\Person($faker));
    return [
        'id' => $faker->unique()->numberBetween(1,31),
        'user_id' => $faker->numberBetween(1,30),
        'enquiry_id' => $faker->numberBetween(1,30),
        'brief' => $faker->text(500),
        'hour_price' => $faker->numberBetween(1,10),
    ];
});
