<?php

namespace Database\Seeders;

use App\Models\GameTag;
use Illuminate\Database\Seeder;

class GameTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameTag::factory()->create(['pt_br_name' => 'Ação', 'en_us_name' => 'Action']);
        GameTag::factory()->create(['pt_br_name' => 'Acesso antecipado', 'en_us_name' => 'Early access']);
        GameTag::factory()->create(['pt_br_name' => 'Adulto', 'en_us_name' => 'Adult']);
        GameTag::factory()->create(['pt_br_name' => 'Aventura', 'en_us_name' => 'Adventure']);
        GameTag::factory()->create(['pt_br_name' => 'Boa trama', 'en_us_name' => 'Good plot']);
        GameTag::factory()->create(['pt_br_name' => 'Caixa de areia', 'en_us_name' => 'Sandbox']);
        GameTag::factory()->create(['pt_br_name' => 'Construção', 'en_us_name' => 'Build']);
        GameTag::factory()->create(['pt_br_name' => 'Cooperativo', 'en_us_name' => 'CoOp']);
        GameTag::factory()->create(['pt_br_name' => 'Cyberpunk', 'en_us_name' => 'Cyberpunk']);
        GameTag::factory()->create(['pt_br_name' => 'Exploração', 'en_us_name' => 'Exploration']);
        GameTag::factory()->create(['pt_br_name' => 'Fabricação', 'en_us_name' => 'Craft']);
        GameTag::factory()->create(['pt_br_name' => 'Fantasia', 'en_us_name' => 'Fantasy']);
        GameTag::factory()->create(['pt_br_name' => 'Ficção Científica', 'en_us_name' => 'Sci-Fi']);
        GameTag::factory()->create(['pt_br_name' => 'Jogador X Ambiente', 'en_us_name' => 'PvE']);
        GameTag::factory()->create(['pt_br_name' => 'Jogador X Jogador', 'en_us_name' => 'PvP']);
        GameTag::factory()->create(['pt_br_name' => 'Multijogador', 'en_us_name' => 'Multiplayer']);
        GameTag::factory()->create(['pt_br_name' => 'Mundo aberto', 'en_us_name' => 'Open world']);
        GameTag::factory()->create(['pt_br_name' => 'Primeira pessoa', 'en_us_name' => 'First person']);
        GameTag::factory()->create(['pt_br_name' => 'RPG de ação', 'en_us_name' => 'ARPG']);
        GameTag::factory()->create(['pt_br_name' => 'Sobrevivência', 'en_us_name' => 'Survival']);
        GameTag::factory()->create(['pt_br_name' => 'Terceira pessoa', 'en_us_name' => 'Third person']);
        GameTag::factory()->create(['pt_br_name' => 'Terror', 'en_us_name' => 'Horror']);
        GameTag::factory()->create(['pt_br_name' => 'Tiro em primeira pessoal', 'en_us_name' => 'FPS']);
        GameTag::factory()->create(['pt_br_name' => 'Um jogador', 'en_us_name' => 'Single player']);
        GameTag::factory()->create(['pt_br_name' => 'Vampiros', 'en_us_name' => 'Vampires']);
        GameTag::factory()->create(['pt_br_name' => 'Violento', 'en_us_name' => 'Violent']);
        GameTag::factory()->create(['pt_br_name' => 'Zumbis', 'en_us_name' => 'Zombis']);
    }
}
