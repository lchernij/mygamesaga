<?php

namespace Tests\Feature\Admin\GameGenre;

use App\Models\GameGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->isAdmin()->create());

        $this->gameGenre = GameGenre::factory()->create();
    }

    public function test_game_genre_update_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->patch('/hq/game-genres/' . $this->gameGenre->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    /**
     * @dataProvider provideInvalidInputs
     */
    public function test_game_genre_update_action_validation_fields($payload, $expected)
    {
        $response = $this->patch('/hq/game-genres/' . $this->gameGenre->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors($expected);
    }

    public function test_game_genre_update_action_validation_fields_unique()
    {
        $gameGenre = GameGenre::factory()->withPtBrLocalization()->create();

        $payload = [
            'name' => $gameGenre->name,
            'acronym' => $gameGenre->acronym,
            'pt_br_name' => $gameGenre->pt_br_name
        ];

        $response = $this->patch('/hq/game-genres/' . $this->gameGenre->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
                'name',
                'acronym',
                'pt_br_name'
            ]);
    }

    /**
     * @dataProvider provideValidInputs
     */
    public function test_game_genre_update_action_create_valid_register($payload, $expected)
    {
        $response = $this->patch('/hq/game-genres/' . $this->gameGenre->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameGenre = GameGenre::first();

        $this->assertEquals($expected['name'], $gameGenre->name);
        $this->assertEquals($expected['acronym'], $gameGenre->acronym);
        $this->assertEquals($expected['description'], $gameGenre->description);
        $this->assertEquals($expected['pt_br_name'], $gameGenre->pt_br_name);
        $this->assertEquals($expected['pt_br_description'], $gameGenre->pt_br_description);
        $this->assertEquals($expected['is_active'], $gameGenre->is_active);
    }

    /**
     * Provider from test_validate_fields
     */
    public function provideInvalidInputs(): array
    {
        return [
            'required' => [
                'payload' => [],
                'expected' => [
                    'name'
                ]
            ],
            'max' => [
                'payload' => [
                    'name' => Str::random(256),
                    'pt_br_name' => Str::random(256),
                    'acronym' => Str::random(11),
                    'description' => Str::random(1001),
                    'pt_br_description' => Str::random(1001)
                ],
                'expected' => [
                    'name',
                    'pt_br_name',
                    'acronym',
                    'description',
                    'pt_br_description'
                ]
            ],
            'in' => [
                'payload' => [
                    'name' => Str::random(1),
                    'is_active' => 'up'
                ],
                'expected' => [
                    'is_active'
                ]
            ]
        ];
    }

    /**
     * Provider from test_game_genre_store_action_create_valid_register
     */
    public function provideValidInputs(): array
    {
        return [
            'active' => [
                'payload' => [
                    'name' => 'Genre',
                    'pt_br_name' => 'Plataforma',
                    'acronym' => 'Plat',
                    'description' => 'Game Style',
                    'pt_br_description' => 'Estilo de jogo',
                    'is_active' => 'on'
                ],
                'expected' => [
                    'name' => 'Genre',
                    'pt_br_name' => 'Plataforma',
                    'acronym' => 'Plat',
                    'description' => 'Game Style',
                    'pt_br_description' => 'Estilo de jogo',
                    'is_active' => true
                ]
            ],
            'inactive' => [
                'payload' => [
                    'name' => 'Genre',
                    'acronym' => '',
                    'description' => '',
                ],
                'expected' => [
                    'name' => 'Genre',
                    'pt_br_name' => '',
                    'acronym' => '',
                    'description' => '',
                    'pt_br_description' => '',
                    'is_active' => false
                ]
            ]
        ];
    }
}
