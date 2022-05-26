<?php

namespace Database\Seeders;

use App\Models\GameGenre;
use Illuminate\Database\Seeder;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameGenre::factory()->create([
            'name' => 'Platform',
            'acronym' => null,
            'pt_br_name' => 'Plataforma'
        ]);
        GameGenre::factory()->create([
            'name' => 'Shooter',
            'acronym' => null,
            'pt_br_name' => 'Tiro'
        ]);
        GameGenre::factory()->create([
            'name' => 'Fighting',
            'acronym' => null,
            'pt_br_name' => 'Luta'
        ]);
        GameGenre::factory()->create([
            'name' => 'Beat\'em up',
            'acronym' => null,
            'pt_br_name' => null
        ]);
        GameGenre::factory()->create([
            'name' => 'Stealth',
            'acronym' => null,
            'pt_br_name' => 'Furtivo'
        ]);
        GameGenre::factory()->create([
            'name' => 'Survival',
            'acronym' => null,
            'pt_br_name' => 'Sobrevivência'
        ]);
        GameGenre::factory()->create([
            'name' => 'Rhythm',
            'acronym' => null,
            'pt_br_name' => 'Ritimo'
        ]);
        GameGenre::factory()->create([
            'name' => 'Survival horror',
            'acronym' => null,
            'pt_br_name' => 'Horror de sobrevivência'
        ]);
        GameGenre::factory()->create([
            'name' => 'Metroidvania',
            'acronym' => null,
            'pt_br_name' => null
        ]);
        GameGenre::factory()->create([
            'name' => 'Action Role-Playing Game',
            'acronym' => 'ARPG',
            'pt_br_name' => 'Jogo de ação com interpretação de papéis'
        ]);
        GameGenre::factory()->create([
            'name' => 'Massively multiplayer online Role-Playing Game',
            'acronym' => 'MMORPG',
            'pt_br_name' => 'Jogo de multijogadores online massivo com interpretação de papéis'
        ]);
        GameGenre::factory()->create([
            'name' => 'Roguelikes',
            'acronym' => null,
            'pt_br_name' => null
        ]);
        GameGenre::factory()->create([
            'name' => 'Tatical Role-Playing Game',
            'acronym' => 'TRPG',
            'pt_br_name' => 'Jogo tático com interpretação de papéis'
        ]);
        GameGenre::factory()->create([
            'name' => 'Sandbox Role-Playing Game',
            'acronym' => 'SRPG',
            'pt_br_name' => 'Jogo Sandbox com interpretação de papéis'
        ]);
        GameGenre::factory()->create([
            'name' => 'Japanese Role-Playing Game',
            'acronym' => 'JRPG',
            'pt_br_name' => 'Jogo japones com interpretação de papéis'
        ]);
        GameGenre::factory()->create([
            'name' => 'Monster Tamer',
            'acronym' => 'MT',
            'pt_br_name' => 'Treinar monstros'
        ]);
        GameGenre::factory()->create([
            'name' => 'Construction simulation',
            'acronym' => 'CS',
            'pt_br_name' => 'Simulador de construção'
        ]);
        GameGenre::factory()->create([
            'name' => 'Management simulation',
            'acronym' => 'MS',
            'pt_br_name' => 'Simulador de gestão'
        ]);
        GameGenre::factory()->create([
            'name' => 'Real-time Strategy',
            'acronym' => 'RTS',
            'pt_br_name' => 'Estratégia em tempo real'
        ]);
        GameGenre::factory()->create([
            'name' => 'Tower defense',
            'acronym' => 'TD',
            'pt_br_name' => 'Defesa de torre'
        ]);
        GameGenre::factory()->create([
            'name' => 'Racing',
            'acronym' => null,
            'pt_br_name' => 'Corrida'
        ]);
        GameGenre::factory()->create([
            'name' => 'Sports game',
            'acronym' => null,
            'pt_br_name' => 'Jogo de esportes'
        ]);
    }
}
