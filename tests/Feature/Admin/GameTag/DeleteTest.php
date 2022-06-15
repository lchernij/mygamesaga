<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\GameTag;
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

        $this->gameTag = GameTag::factory()->create();
    }

    public function test_game_tag_delete_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->delete('/hq/game-tags/' . $this->gameTag->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_tag_delete_action()
    {
        $response = $this->delete('/hq/game-tags/' . $this->gameTag->id);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameTag = GameTag::find($this->gameTag->id);
        $this->assertNull($gameTag);

        $gameTag = GameTag::withTrashed()->find($this->gameTag->id);
        $this->assertNotNull($gameTag->deleted_at);
    }
}
