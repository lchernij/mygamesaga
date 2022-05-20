<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->isAdmin()->create([
            'name' => 'Leandro Chernij',
            'email' => 'leandro@local.com',
            'password' => Hash::make('123123')
        ]);
    }
}
