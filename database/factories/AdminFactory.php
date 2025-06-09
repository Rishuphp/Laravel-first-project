<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'c_name' => 'Task Management System',
            'fullname' => 'Rishu ',
            'phone' => '8888888888',
            'email' => 'moki123@gmail.com',
            'address' => 'banaras',
            'username' => 'rishu123',
            'password' =>Hash::make('1111')
        ];
    }
}
