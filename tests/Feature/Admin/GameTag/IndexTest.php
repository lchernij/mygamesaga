<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\GameTag;
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

    public function test_game_tag_screen_can_not_be_rendered_when_guess()
    {
        Auth::logout();
        
        $response = $this->get('/hq/game-tags');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_tag_screen_can_be_rendered_empty()
    {
        $response = $this->get('/hq/game-tags');

        $response->assertStatus(200)
            ->assertSeeText("Game Tag (0)")
            ->assertSeeText("Add new")
            ->assertSeeText("Empty list");
    }

    public function test_game_tag_screen_can_be_rendered_with_one_result()
    {
        $gameTag = GameTag::factory()->withEnUsLocalization()->create();

        $response = $this->get('/hq/game-tags');

        $response->assertStatus(200)
            ->assertSeeText("Game Tag (1)")
            ->assertSeeText("Add new")
            ->assertSeeText($gameTag->name)
            ->assertSeeText($gameTag->pt_br_name)
            ->assertSeeText($gameTag->acronym)
            ->assertSeeText($gameTag->shortDescription)
            ->assertSeeText($gameTag->shortDescriptionPtBr)
            ->assertSeeText($gameTag->status)
            ->assertSeeText(['More', 'Edit', 'Inactive']);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-tags/' . $gameTag->id . '">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-tags/' . $gameTag->id . '/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-tags/' . $gameTag->id . '/inactive">', $response->content());
    }

    public function test_game_tag_screen_can_be_rendered_pagination()
    {
        GameTag::factory(16)->create();

        $response = $this->get('/hq/game-tags');

        $response->assertStatus(200)
            ->assertSeeText("Game Tag (16)");

        $this->assertStringContainsString("http://localhost/hq/game-tags?page=2", $response->content());
    }
}
