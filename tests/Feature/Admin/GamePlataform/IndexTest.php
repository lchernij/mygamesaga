<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_game_plataform_screen_can_not_be_rendered_when_guess()
    {
        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_screen_can_be_rendered_empty()
    {
        $this->setAdminUser();

        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (0)")
            ->assertSeeText("Add new")
            ->assertSeeText("Empty list");
    }

    public function test_game_plataform_screen_can_be_rendered_with_one_result()
    {
        $this->setAdminUser();
        $gamePlatform = GamePlataform::factory()->create();

        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (1)")
            ->assertSeeText("Add new")
            ->assertSeeText($gamePlatform->name)
            ->assertSeeText($gamePlatform->acronym)
            ->assertSeeText($gamePlatform->company)
            ->assertSeeText($gamePlatform->status)
            ->assertSeeText(['More', 'Edit', 'Inactive']);

        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/1">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/1/edit">', $response->content());
        $this->assertStringContainsString('<a class="button" href="http://localhost/hq/game-plataforms/1/inactive">', $response->content());
    }

    public function test_game_plataform_screen_can_be_rendered_pagination()
    {
        $this->setAdminUser();
        GamePlataform::factory(16)->create();

        $response = $this->get('/hq/game-plataforms');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform (16)");

        $this->assertStringContainsString("http://localhost/hq/game-plataforms?page=2", $response->content());
    }

    private function setAdminUser(): void
    {
        $user = User::factory()->isAdmin()->create();

        $this->actingAs($user);
    }
}
