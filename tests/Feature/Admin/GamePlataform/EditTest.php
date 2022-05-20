<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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
        
        $this->gamePlataform = GamePlataform::factory()->create();
    }

    public function test_game_plataform_edit_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id . '/edit');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_edit_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id . '/edit');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform")
            ->assertSeeText("Edit")
            ->assertSeeText("Name")
            ->assertSeeText("Acronym")
            ->assertSeeText("Company")
            ->assertSeeText("Active");

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-plataforms/' . $this->gamePlataform->id . '">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
