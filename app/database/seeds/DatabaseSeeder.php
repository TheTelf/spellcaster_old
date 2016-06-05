<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('BattleTableSeeder');
		$this->command->info('Battle table seeded.');
		$this->call('FighterTableSeeder');
		$this->command->info('Fighter table seeded.');
	}

}
