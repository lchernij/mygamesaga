<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class InactiveTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());

        $this->gameGenre = GameGenre::factory()->create();
    }

    public function test_game_genre_inactive_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id . '/inactive');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_genre_active_action()
    {
        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id . '/inactive');

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameGenre = GameGenre::first();
        $this->assertFalse($gameGenre->is_active);
    }
}
