<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());
    }

    public function test_game_genre_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();
        
        $response = $this->get('/hq/game-genres');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_genre_screen_can_be_rendered_empty()
    {
        $response = $this->get('/hq/game-genres');

        $response->assertStatus(200)
            ->assertSeeText("Game Genre (0)")
            ->assertSeeText("Add new")
            ->assertSeeText("Empty list");
    }

    public function test_game_genre_screen_can_be_rendered_with_one_result()
    {
        $gameGenre = GameGenre::factory()->withPtBrLocalization()->create();

        $response = $this->get('/hq/game-genres');

        $response->assertStatus(200)
            ->assertSeeText("Game Genre (1)")
            ->assertSeeText("Add new")
            ->assertSeeText($gameGenre->name)
            ->assertSeeText($gameGenre->pt_br_name)
            ->assertSeeText($gameGenre->acronym)
            ->assertSeeText($gameGenre->shortDescription)
            ->assertSeeText($gameGenre->shortDescriptionPtBr)
            ->assertSeeText($gameGenre->status)
            ->assertSeeText(['More', 'Edit', 'Inactive']);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-genres/' . $gameGenre->id . '">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-genres/' . $gameGenre->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-genres/' . $gameGenre->id . '/inactive">', $response->content());
    }

    public function test_game_genre_screen_can_be_rendered_pagination()
    {
        GameGenre::factory(16)->create();

        $response = $this->get('/hq/game-genres');

        $response->assertStatus(200)
            ->assertSeeText("Game Genre (16)");

        $this->assertStringContainsString("http://localhost/hq/game-genres?page=2", $response->content());
    }
}
