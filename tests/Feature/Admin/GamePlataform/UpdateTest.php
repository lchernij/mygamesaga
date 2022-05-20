<?php

namespace Tests\Feature\Admin\GamePlataform;

use App\Models\GamePlataform;
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
        
        $this->gamePlataform = GamePlataform::factory()->create();
    }

    public function test_game_plataform_update_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->patch('/hq/game-plataforms/' . $this->gamePlataform->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    /**
     * @dataProvider provideInvalidInputs
     */
    public function test_game_plataform_update_action_validation_fields($payload, $expected)
    {
        $response = $this->patch('/hq/game-plataforms/' . $this->gamePlataform->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors($expected);
    }

    public function test_game_plataform_update_action_validation_fields_unique()
    {
        $gamePlatform = GamePlataform::factory()->create();

        $payload = [
            'name' => $gamePlatform->name,
            'acronym' => $gamePlatform->acronym,
        ];

        $response = $this->patch('/hq/game-plataforms/' . $this->gamePlataform->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
                'name',
                'acronym'
            ]);
    }

    /**
     * @dataProvider provideValidInputs
     */
    public function test_game_plataform_update_action_create_valid_register($payload, $expected)
    {
        $response = $this->patch('/hq/game-plataforms/' . $this->gamePlataform->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gamePlatform = GamePlataform::first();

        $this->assertEquals($expected['name'], $gamePlatform->name);
        $this->assertEquals($expected['acronym'], $gamePlatform->acronym);
        $this->assertEquals($expected['company'], $gamePlatform->company);
        $this->assertEquals($expected['is_active'], $gamePlatform->is_active);
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
                    'acronym' => Str::random(11),
                    'company' => Str::random(256)
                ],
                'expected' => [
                    'name',
                    'acronym',
                    'company'
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
     * Provider from test_game_plataform_store_action_create_valid_register
     */
    public function provideValidInputs(): array
    {
        return [
            'active' => [
                'payload' => [
                    'name' => 'Playstation',
                    'acronym' => 'PSX',
                    'company' => 'Sony',
                    'is_active' => 'on'
                ],
                'expected' => [
                    'name' => 'Playstation',
                    'acronym' => 'PSX',
                    'company' => 'Sony',
                    'is_active' => true
                ]
            ],
            'inactive' => [
                'payload' => [
                    'name' => 'Playstation',
                    'acronym' => '',
                    'company' => '',
                ],
                'expected' => [
                    'name' => 'Playstation',
                    'acronym' => '',
                    'company' => '',
                    'is_active' => false
                ]
            ]
        ];
    }
}
