<?php

namespace Tests\Factories;

use App\Domain\User\Enums\Role;
use App\User;
use Christophrumpel\LaravelFactoriesReloaded\BaseFactory;
use Faker\Generator as Faker;

class UserFactory extends BaseFactory
{
    protected string $modelClass = User::class;

    protected string $role = Role::ADMIN;

    public function create(array $extra = []): User
    {
        $user = parent::build($extra);

        // add Role as well
        $user->addRole($this->role);

        return $user;
    }

    public function make(array $extra = []): User
    {
        return parent::build($extra, 'make');
    }

    public function getDefaults(Faker $faker): array
    {
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password')
        ];
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
