<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page response
     *
     * @return void
     */
    public function test_login_page_returns_redirect_response(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/login')
            ->assertRedirect(url(RouteServiceProvider::HOME)); // Should redirect to home
    }

    /**
     * Test login page response for guest
     *
     * @return void
     */
    public function test_login_page_returns_response_for_guest(): void
    {
        $this->get('/login')
            ->assertInertia(function (Assert $page) {
                $page->component('Auth/Login')
                    ->has('csrf_token');
            });
    }

    /**
     * Test login page form response
     *
     * @return void
     */
    public function test_login_page_form_returns_response(): void
    {
        $password = Str::random(10);
        $user = User::factory()->create([
            'password' => Hash::make($password)
        ]);

        $this->post('/login', ['email' => $user->email, 'password' => $password])
            ->assertValid()
            ->assertRedirect(url(RouteServiceProvider::HOME)); // Should redirect to home
    }

    /**
     * Test register page response
     *
     * @return void
     */
    public function test_register_page_returns_redirect_response(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/login')
            ->assertRedirect(url(RouteServiceProvider::HOME)); // Should redirect to home
    }

    /**
     * Test register page response for guest
     *
     * @return void
     */
    public function test_register_page_returns_response_for_guest(): void
    {
        $this->get('/register')
            ->assertInertia(function (Assert $page) {
                $page->component('Auth/Register')
                    ->has('csrf_token');
            });
    }

    /**
     * Test register page form response
     *
     * @return void
     */
    public function test_register_page_form_returns_response(): void
    {
        $password = Str::random(10);

        $data = [
            'name' => Str::random(10),
            'email' => Str::random(10) . '@test.com',
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->post('/register', $data)
            ->assertValid()
            ->assertRedirect(url(RouteServiceProvider::HOME));

        // Check if user model was created
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    /**
     * Test demo login page response
     *
     * @return void
     */
    public function test_demo_user_login_response(): void
    {
        $this->get('/demo')
            ->assertValid()
            ->assertRedirect(url(RouteServiceProvider::HOME));

        // Check if user model was created
        $this->assertDatabaseHas('users', [
            'demo' => true,
        ]);
    }
}
