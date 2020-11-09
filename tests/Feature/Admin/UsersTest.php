<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\User\Enums\Role;
use App\User;
use Illuminate\Support\Arr;
use Database\Factories\UserFactory;
use Tests\TestCase;

class UsersTest extends TestCase
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

    /** @test */
    public function users_can_index()
    {
        $this->get(route('users.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function users_form_is_access_to_all()
    {
        $this->get(route('users.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function admin_can_create_users()
    {
        // $this->withExceptionHandling();
        $data = UserFactory::new()->getFormData();
        $this->post(route('users.store'), $data)
            ->assertSessionHasNoErrors();

        // assert Data is persisted into te database
        $this->assertDatabaseHas('users', Arr::except($data, ['password']));

        // Login out and Assert User can login with above credential
        auth()->logout();
        $this->post('login', [
            'email' => $data['email'],
            'password' => $data['password']
        ])->assertSessionHasNoErrors();
        $this->assertAuthenticated();

        // Assert User has Admin Role
        $user = User::where('email', $data['email'])->first();
        $this->assertTrue($user->hasGotRole(Role::ADMIN));
    }
}
