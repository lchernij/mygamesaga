<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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

        $this->gamePlataform = GamePlataform::factory()->create();
    }

    public function test_game_plataform_inactive_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id . '/inactive');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_active_action()
    {
        $response = $this->get('/hq/game-plataforms/' . $this->gamePlataform->id . '/inactive');

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gamePlatform = GamePlataform::first();
        $this->assertFalse($gamePlatform->is_active);
    }
}
