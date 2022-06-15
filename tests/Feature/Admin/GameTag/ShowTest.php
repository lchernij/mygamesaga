<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\GameTag;
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
        
        $this->gameTag = GameTag::factory()->create();
    }

    public function test_game_tag_show_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();

        $response = $this->get('/hq/game-tags/' . $this->gameTag->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_tag_show_screen_can_be_rendered()
    {
        $response = $this->get('/hq/game-tags/' . $this->gameTag->id);

        $response->assertStatus(200)
            ->assertSeeText("Game Tag")
            ->assertSeeText("Name PT_BR")
            ->assertSeeText($this->gameTag->pt_br_name)
            ->assertSeeText("Name EN_US")
            ->assertSeeText($this->gameTag->en_us_name)
            ->assertSeeText("Active")
            ->assertSeeText($this->gameTag->is_active)
            ->assertSeeText("Created at")
            ->assertSeeText($this->gameTag->created_at)
            ->assertSeeText("Updated at")
            ->assertSeeText($this->gameTag->updated_at);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-tags/' . $this->gameTag->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-tags/' . $this->gameTag->id . '/inactive">', $response->content());

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-tags/' . $this->gameTag->id . '">', $response->content());
        $this->assertStringContainsString('<input type="hidden" name="_method" value="DELETE">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }
}
