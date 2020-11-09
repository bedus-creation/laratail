<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\User\Enums\Role;
use Illuminate\Database\Eloquent\Model;

class UserFactory extends Factory
{
    protected string $role = Role::ADMIN;

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
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password')
        ];
    }

    public function create($attributes = [], ?Model $parent = NULL)
    {
        $user = parent::create($attributes, $parent);

        // add Role as well
        $user->addRole($this->role);

        return $user;
    }

    public function withRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getFormData(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password'
        ];
    }
}
