<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());
    }

    public function test_dashboard_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/dashboard');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_dashboard_screen_can_be_rendered()
    {
        $this->actingAs(User::factory()->isAdmin()->create());

        $response = $this->get('/hq/dashboard');

        $response->assertStatus(200)
            ->assertSeeText("You're logged in!", false);
    }
}
