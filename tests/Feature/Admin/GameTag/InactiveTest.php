<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\GameTag;
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

        $this->gameTag = GameTag::factory()->create();
    }

    public function test_game_tag_inactive_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-tags/' . $this->gameTag->id . '/inactive');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_tag_active_action()
    {
        $response = $this->get('/hq/game-tags/' . $this->gameTag->id . '/inactive');

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameTag = GameTag::first();
        $this->assertFalse($gameTag->is_active);
    }
}
