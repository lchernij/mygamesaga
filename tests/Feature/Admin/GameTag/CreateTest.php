<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());
    }

    public function test_game_tag_create_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();
        
        $response = $this->get('/hq/game-tags/create');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_tag_create_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-tags/create');

        $response->assertStatus(200)
            ->assertSeeText("Game Tag")
            ->assertSeeText("New")
            ->assertSeeText("Name PT_BR")
            ->assertSeeText("Name EN_US")
            ->assertSeeText("Active");

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-tags">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
