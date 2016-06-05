<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FighterTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('fighters')->delete();

        Fighter::create([
            'identifier' => 'Gandalf',
            'hp' => 100,
            'team' => 2,
            'battle_id' => 1
        ]);

        Fighter::create([
            'identifier' => 'Dumbledore',
            'hp' => 100,
            'team' => 1,
            'battle_id' => 1
        ]);
    }
}