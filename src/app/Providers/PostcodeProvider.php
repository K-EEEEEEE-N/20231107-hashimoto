<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Provider\Base;

class PostcodeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->extend(\Faker\Generator::class, function ($faker) {
            $faker->addProvider(new PostcodeGenerator($faker));
            return $faker;
        });
    }
}

class PostcodeGenerator
{
    protected $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }

    public function postcode()
    {
        return $this->faker->numberBetween(100,999) . '-' . $this->faker->numberBetween(1000,9999);
    }
}


