<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => UserType::Student,
            ];
        });
    }

    public function mentor()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => UserType::Mentor,
            ];
        });
    }

    public function head()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => UserType::Head,
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => UserType::Admin,
            ];
        });
    }
}
