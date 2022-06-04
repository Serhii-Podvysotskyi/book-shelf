<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test welcome page response for auth user
     *
     * @return void
     */
    public function test_welcome_page_redirect(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/')
            ->assertRedirect(url('books')); // Should redirect to books
    }

    /**
     * Test welcome page response for guest
     *
     * @return void
     */
    public function test_welcome_page_response_for_guest(): void
    {
        $this->get('/')
            ->assertInertia(function (Assert $page) {
                $page->component('Welcome'); // Should return Welcome page
            });
    }
}
