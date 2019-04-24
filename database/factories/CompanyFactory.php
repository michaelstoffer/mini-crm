<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Company::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'logo' => Storage::disk('public')->putFile('/', $imageFile),
        'website' => $faker->safeEmailDomain,
    ];
});
