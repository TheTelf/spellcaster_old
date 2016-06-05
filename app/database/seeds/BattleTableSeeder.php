<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BattleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('battles')->delete();

        Battle::create([]);
    }
}