<?php

namespace Database\Seeders;

use App\Models\GamePlataform;
use Illuminate\Database\Seeder;

class GamePlataformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GamePlataform::factory()->create([
            'name' => 'Atari 2600',
            'acronym' => 'Atari',
            'company' => 'Atari'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Game Boy Advance',
            'acronym' => 'GBA',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Game Boy',
            'acronym' => 'GB',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo 3DS',
            'acronym' => '3DS',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo 64',
            'acronym' => 'N64',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo DS',
            'acronym' => 'DS',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo Entertainment System',
            'acronym' => 'NES',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo Game Cube',
            'acronym' => 'NGC',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Nintendo Switch',
            'acronym' => 'NX',
            'company' => 'Nintendo'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Personal Computer',
            'acronym' => 'PC',
            'company' => '-'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Playstation 2',
            'acronym' => 'PS2',
            'company' => 'Sony'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Playstation 3',
            'acronym' => 'PS3',
            'company' => 'Sony'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Playstation 4',
            'acronym' => 'PS4',
            'company' => 'Sony'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Playstation 5',
            'acronym' => 'PS5',
            'company' => 'Sony'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Playstation',
            'acronym' => 'PSX',
            'company' => 'Sony'
        ]);
        GamePlataform::factory()->create([
            'name' => 'Super Nintendo Entertainment System',
            'acronym' => 'SNES',
            'company' => 'Nintendo'
        ]);
    }
}
