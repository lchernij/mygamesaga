<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') === 'local') {
            \App\Models\User::factory(1)->isAdmin()->create([
                'name' => 'Leandro Chernij',
                'email' => 'leandro@local.com',
                'password' => Hash::make('123123')
            ]);
        }
    }
}
