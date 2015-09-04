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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function ($faker) {

    return [
        'language_id' => rand(1, 3),
        'user_id' => 1,
        'article_category_id' => rand(1, 2),
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'introduction' => $faker->paragraph,
        'content' => $faker->text,
        'source' => $faker->url,
    ];
});

$factory->define(App\ArticleCategory::class, function ($faker) {

    return [
        'language_id' => rand(1, 3),
        'user_id' => 1,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->define(App\Customers::class, function ($faker) {

    return [
        'customer_name' => $faker->name,
        'customers_segment' => rand(1, 4),
        'customer_sales' => $faker->name,
        'customer_cp' => $faker->name,
        
    ];
});

$factory->define(App\DcCustomers::class, function ($faker) {

    return [
        'cid' => $faker->name,
        'customer_id' => rand(1, 4),
        'dc_location' => rand(1,2),
        'service_type' => rand(1,3),
        
    ];
});