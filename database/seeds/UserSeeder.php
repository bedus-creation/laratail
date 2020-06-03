<?php

use App\Domain\User\Enums\Role;
use App\User;
use Illuminate\Database\Seeder;
use Tests\Factories\UserFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::new()->withRole(Role::SYSTEM_ADMIN)
            ->create(['name' => 'System Admin', 'email' => 'root@web2tailwind.com']);
    }
}
