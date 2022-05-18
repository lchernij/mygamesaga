<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_screen_can_not_be_rendered_when_guess()
    {
        $response = $this->get('/hq/dashboard');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_dashboard_screen_can_be_rendered()
    {
        $user = User::factory()->isAdmin()->create();

        $this->actingAs($user);

        $response = $this->get('/hq/dashboard');

        $response->assertStatus(200)
            ->assertSeeText("You're logged in!", false);
    }
}
