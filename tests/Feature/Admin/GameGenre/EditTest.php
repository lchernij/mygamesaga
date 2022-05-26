<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());
        
        $this->gameGenre = GameGenre::factory()->create();
    }

    public function test_game_genre_edit_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id . '/edit');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_genre_edit_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id . '/edit');

        $response->assertStatus(200)
            ->assertSeeText("Game Genre")
            ->assertSeeText("Edit")
            ->assertSeeText("Name EN")
            ->assertSeeText("Name PT_BR")
            ->assertSeeText("Acronym")
            ->assertSeeText("Description EN")
            ->assertSeeText("Description PT_BR")
            ->assertSeeText("Active");

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-genres/' . $this->gameGenre->id . '">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
