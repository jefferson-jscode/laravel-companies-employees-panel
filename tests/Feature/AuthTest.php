<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Session::start();
    }

    /**
     * When accessing / the user is redirected to the login page.
     */
    public function testIndexRedirectsToLoginPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testAfterSuccessfulLoginUserSeesDashboard()
    {
        $user = User::factory()->create([
            'email' => 'test-login@email.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post(route('login'), [
            '_token' => csrf_token(),
            'email' => 'test-login@email.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home'));
    }

    /**
     * A user can't login with wrong email and/or password.
     */
    public function testCantLoginWithWrongCredentials(): void
    {
        User::factory()->create([
            'email' => 'test-login@email.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post(route('login'), [
            '_token' => csrf_token(),
            'email' => 'wrong-login@email.com',
            'password' => 'password',
        ]);
        $this->assertGuest();
        $response->assertRedirect(route('index'));

        $response = $this->post(route('login'), [
            '_token' => csrf_token(),
            'email' => 'test-login@email.com',
            'password' => 'password0',
        ]);
        $this->assertGuest();
        $response->assertRedirect(route('index'));

        $response = $this->post(route('login'), [
            '_token' => csrf_token(),
            'email' => 'wrong-login@email.com',
            'password' => 'password0',
        ]);
        $this->assertGuest();
        $response->assertRedirect(route('index'));
    }
}
