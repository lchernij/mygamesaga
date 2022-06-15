<?php

namespace Tests\Feature\Admin\GameTag;

use App\Models\GameTag;
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

        $this->gameTag = GameTag::factory()->create();
    }

    public function test_game_tag_update_action_can_not_be_access_when_guess()
    {
        Auth::logout();

        $response = $this->patch('/hq/game-tags/' . $this->gameTag->id);

        $response->assertStatus(302)
            ->assertLocation('/hq/login');
    }

    /**
     * @dataProvider provideInvalidInputs
     */
    public function test_game_tag_update_action_validation_fields($payload, $expected)
    {
        $response = $this->patch('/hq/game-tags/' . $this->gameTag->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors($expected);
    }

    public function test_game_tag_update_action_validation_fields_unique()
    {
        $gameTag = GameTag::factory()->withEnUsLocalization()->create();

        $payload = [
            'pt_br_name' => $gameTag->pt_br_name,
            'en_us_name' => $gameTag->en_us_name
        ];

        $response = $this->patch('/hq/game-tags/' . $this->gameTag->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
                'pt_br_name',
                'en_us_name'
            ]);
    }

    /**
     * @dataProvider provideValidInputs
     */
    public function test_game_tag_update_action_create_valid_register($payload, $expected)
    {
        $response = $this->patch('/hq/game-tags/' . $this->gameTag->id, $payload);

        $response->assertStatus(302)
            ->assertSessionHasNoErrors();

        $gameTag = GameTag::first();

        $this->assertEquals($expected['pt_br_name'], $gameTag->pt_br_name);
        $this->assertEquals($expected['en_us_name'], $gameTag->en_us_name);
        $this->assertEquals($expected['is_active'], $gameTag->is_active);
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
                    'pt_br_name'
                ]
            ],
            'max' => [
                'payload' => [
                    'pt_br_name' => Str::random(256),
                    'en_us_name' => Str::random(256),
                ],
                'expected' => [
                    'pt_br_name',
                    'en_us_name',
                ]
            ],
            'in' => [
                'payload' => [
                    'pt_br_name' => Str::random(1),
                    'is_active' => 'up'
                ],
                'expected' => [
                    'is_active'
                ]
            ]
        ];
    }

    /**
     * Provider from test_game_tag_store_action_create_valid_register
     */
    public function provideValidInputs(): array
    {
        return [
            'active' => [
                'payload' => [
                    'pt_br_name' => 'Sobrevivência',
                    'en_us_name' => 'Survive',
                    'is_active' => 'on'
                ],
                'expected' => [
                    'pt_br_name' => 'Sobrevivência',
                    'en_us_name' => 'Survive',
                    'is_active' => true
                ]
            ],
            'inactive' => [
                'payload' => [
                    'pt_br_name' => 'Sobrevivência',
                    'description' => '',
                ],
                'expected' => [
                    'pt_br_name' => 'Sobrevivência',
                    'en_us_name' => '',
                    'is_active' => false
                ]
            ]
        ];
    }
}
