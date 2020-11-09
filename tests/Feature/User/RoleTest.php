<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\UserFactory;
use App\Domain\User\Enums\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        // Setup Admin User
        $admin = UserFactory::new()->withRole(Role::ADMIN)->create();
        $this->be($admin);
    }

    /**
     * @test
     *
     * @dataProvider \Database\Factories\RoleFactory::role200StatusRoutes()
     *
     * @return void
     */
    public function roleRoutes200StatusTest($route, $status)
    {
        $this->get($route)
            ->assertStatus($status);
    }
}
