<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());
        
        $this->gameGenre = GameGenre::factory()->create();
    }

    public function test_game_genre_show_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_genre_show_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-genres/' . $this->gameGenre->id);

        $response->assertStatus(200)
            ->assertSeeText("Game Genre")
            ->assertSeeText("Name EN")
            ->assertSeeText($this->gameGenre->name)
            ->assertSeeText("Name PT_BR")
            ->assertSeeText($this->gameGenre->pt_br_name)
            ->assertSeeText("Acronym")
            ->assertSeeText("Description EN")
            ->assertSeeText($this->gameGenre->description)
            ->assertSeeText("Description PT_BR")
            ->assertSeeText($this->gameGenre->pt_br_description)
            ->assertSeeText("Active")
            ->assertSeeText($this->gameGenre->is_active)
            ->assertSeeText("Created at")
            ->assertSeeText($this->gameGenre->created_at)
            ->assertSeeText("Updated at")
            ->assertSeeText($this->gameGenre->updated_at);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-genres/' . $this->gameGenre->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-genres/' . $this->gameGenre->id . '/inactive">', $response->content());

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-genres/' . $this->gameGenre->id . '">', $response->content());
        $this->assertStringContainsString('<input type="hidden" name="_method" value="DELETE">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
