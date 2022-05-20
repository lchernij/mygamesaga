<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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

        $this->gamePlataform = GamePlataform::factory()->create();
    }

    public function test_game_plataform_delete_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->delete('/hq/game-plataforms/' . $this->gamePlataform->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_delete_action()
    {
        $response = $this->delete('/hq/game-plataforms/' . $this->gamePlataform->id);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gamePlatform = GamePlataform::find($this->gamePlataform->id);
        $this->assertNull($gamePlatform);

        $gamePlatform = GamePlataform::withTrashed()->find($this->gamePlataform->id);
        $this->assertNotNull($gamePlatform->deleted_at);
    }
}
