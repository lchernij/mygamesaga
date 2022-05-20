<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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
        
        $this->gamePlataform = GamePlataform::factory()->create();
    }

    public function test_game_plataform_show_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_show_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id);

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform")
            ->assertSeeText($this->gamePlataform->name)
            ->assertSeeText("Name")
            ->assertSeeText("Acronym")
            ->assertSeeText($this->gamePlataform->name)
            ->assertSeeText("Company")
            ->assertSeeText($this->gamePlataform->company)
            ->assertSeeText("Active")
            ->assertSeeText($this->gamePlataform->is_active)
            ->assertSeeText("Created at")
            ->assertSeeText($this->gamePlataform->created_at)
            ->assertSeeText("Updated at")
            ->assertSeeText($this->gamePlataform->updated_at);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/' . $this->gamePlataform->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/' . $this->gamePlataform->id . '/inactive">', $response->content());

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-plataforms/' . $this->gamePlataform->id . '">', $response->content());
        $this->assertStringContainsString('<input type="hidden" name="_method" value="DELETE">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
