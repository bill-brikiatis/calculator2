<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frosts', function($table) {
			
			$table->increments('id');
			$table->timestamps();
			$table->string('postal_Code')->unique();
			$table->string('last_Frost_Date');
		});
			
		Schema::create('gardeners', function($table) {
			
			$table->increments('id');
			$table->timestamps();
			$table->string('email')->unique();
        	$table->string('password');
        	$table->string('gardener_Role')->nullable();
			$table->boolean('remember_token')->nullable();
			$table->integer('frost_id')->unsigned()->nullable();
			$table->foreign('frost_id')->references('id')->on('frosts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('frosts');
		Schema::drop('gardeners');
	}

}
