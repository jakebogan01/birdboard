<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends Factory
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id' => fn () => Auth::User() ? Auth::User()->getAuthIdentifier() : User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph()
        ];
    }
}
