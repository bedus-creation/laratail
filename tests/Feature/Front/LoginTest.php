<?php

namespace Tests\Feature\Front;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\UserFactory;
use App\Domain\User\Enums\Role;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();

        // Create Admin User
        $this->user = UserFactory::new()->withRole(Role::ADMIN)->create();
    }

    /** @test */
    public function guest_user_can_access_login_page()
    {
        $this->get(route('login'))
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_login()
    {
        $data = [
            "email" => $this->user->email,
            "password" => "password"
        ];

        $this->post(route('login'), $data)
            ->assertSessionHasNoErrors();

        $this->assertAuthenticatedAs($this->user);
    }
}
