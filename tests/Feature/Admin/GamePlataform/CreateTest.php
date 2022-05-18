<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_game_plataform_create_screen_can_not_be_rendered_when_guess()
    {
        $response = $this->get('/hq/game-plataforms/create');

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    public function test_game_plataform_create_screen_can_be_rendered()
    {
        $this->setAdminUser();

        $response = $this->get('/hq/game-plataforms/create');

        $response->assertStatus(200)
            ->assertSeeText("Game Plataform")
            ->assertSeeText("New")
            ->assertSeeText("Name")
            ->assertSeeText("Acronym")
            ->assertSeeText("Company")
            ->assertSeeText("Active");

        $this->assertStringContainsString('<form method="POST" action="http://localhost/hq/game-plataforms">', $response->content());
        $this->assertStringContainsString('<button type="submit"', $response->content());
    }

    public function test_game_plataform_create_screen_validation_fields_required()
    {
        $this->setAdminUser();
        
        $payload = [];

        $response = $this->post('/hq/game-plataforms', $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
                'name'
            ]);
    }

    public function test_game_plataform_create_screen_validation_fields_unique()
    {
        $this->setAdminUser();
        $gamePlatform = GamePlataform::factory()->create();
        
        $payload = [
            'name' => $gamePlatform->name,
            'acronym' => $gamePlatform->acronym,
        ];

        $response = $this->post('/hq/game-plataforms', $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
                'name',
                'acronym'
            ]);
    }

    public function test_game_plataform_create_screen_create_valid_register()
    {
        $this->setAdminUser();
        
        $payload = [
            'name' => 'Playstation',
            'acronym' => 'PSX',
            'company' => 'Sony',
            'is_active' => 'on'
        ];

        $response = $this->post('/hq/game-plataforms', $payload);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();
        
        $gamePlatform = GamePlataform::first();

        $this->assertEquals($payload['name'], $gamePlatform->name);
        $this->assertEquals($payload['acronym'], $gamePlatform->acronym);
        $this->assertEquals($payload['company'], $gamePlatform->company);
        $this->assertTrue($gamePlatform->is_active);
    }

    private function setAdminUser(): void
    {
        $user = User::factory()->isAdmin()->create();

        $this->actingAs($user);
    }
}
