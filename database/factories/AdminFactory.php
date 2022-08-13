<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'status' => 0,
            'email_verified_at' => now(),
            'password' => '$2a$10$Hxpvtn1XMsblBI5Twj9M5.uaRpLwTf6RzSYrXT10/b2J43yiKtNb6', // 123456
            // 'remember_token' => Str::random(10),
        ];
    }
}
