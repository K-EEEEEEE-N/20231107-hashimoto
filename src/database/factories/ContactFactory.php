<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prefecture = $this->faker->prefecture();
        $street_address = $this->faker->streetAddress();

        return [
            'fullname' => $this->faker->name,
            'gender' =>$this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail,
            'postcode' => $this->faker->postcode,
            'address' => $prefecture . $street_address,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText(120),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
