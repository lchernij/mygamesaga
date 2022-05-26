<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());

        $this->gameGenre = GameGenre::factory()->create();
    }

    public function test_game_genre_delete_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->delete('/hq/game-genres/' . $this->gameGenre->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_genre_delete_action()
    {
        $response = $this->delete('/hq/game-genres/' . $this->gameGenre->id);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameGenre = GameGenre::find($this->gameGenre->id);
        $this->assertNull($gameGenre);

        $gameGenre = GameGenre::withTrashed()->find($this->gameGenre->id);
        $this->assertNotNull($gameGenre->deleted_at);
    }
}
