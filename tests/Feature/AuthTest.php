<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_displayed(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSee('ユーザーネーム');
        $response->assertSee('パスワード');
    }

    public function test_user_can_login_with_name_and_password(): void
    {
        $user = User::factory()->create([
            'name' => 'demo',
        ]);

        $response = $this->post(route('login.store'), [
            'name' => 'demo',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('study-logs.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_password(): void
    {
        User::factory()->create([
            'name' => 'demo',
        ]);

        $response = $this->from(route('login'))->post(route('login.store'), [
            'name' => 'demo',
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('name');
        $this->assertGuest();
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
