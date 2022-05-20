<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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

    public function test_game_plataform_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();
        
        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_screen_can_be_rendered_empty()
    {
        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (0)")
            ->assertSeeText("Add new")
            ->assertSeeText("Empty list");
    }

    public function test_game_plataform_screen_can_be_rendered_with_one_result()
    {
        $gamePlataform = GamePlataform::factory()->create();

        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (1)")
            ->assertSeeText("Add new")
            ->assertSeeText($gamePlataform->name)
            ->assertSeeText($gamePlataform->acronym)
            ->assertSeeText($gamePlataform->company)
            ->assertSeeText($gamePlataform->status)
            ->assertSeeText(['More', 'Edit', 'Inactive']);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/' . $gamePlataform->id . '">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/' . $gamePlataform->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/' . $gamePlataform->id . '/inactive">', $response->content());
    }

    public function test_game_plataform_screen_can_be_rendered_pagination()
    {
        GamePlataform::factory(16)->create();

        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (16)");

        $this->assertStringContainsString("http://localhost/hq/game-plataforms?page=2", $response->content());
    }
}
