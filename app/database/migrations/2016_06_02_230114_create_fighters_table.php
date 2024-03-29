<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFightersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fighters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('identifier');
			$table->integer('team');
			$table->integer('hp');
			$table->integer('battle_id');
			$table->integer('user_id');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fighters');
	}

}
