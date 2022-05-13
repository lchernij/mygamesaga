<?php

namespace Tests\Feature\Guess;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSeeText("Laravel");
    }
}
