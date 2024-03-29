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

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded.');
		$this->call('BattleTableSeeder');
		$this->command->info('Battle table seeded.');
		$this->call('FighterTableSeeder');
		$this->command->info('Fighter table seeded.');
	}

}
