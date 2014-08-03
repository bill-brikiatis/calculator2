<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGardenersNull extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gardeners', function($table) {
			$table->dropColumn('postal_Code');
			$table->dropColumn('gardener_Role');
			$table->dropForeign('frost_id');
			$table->dropColumn('frost_id');
			$table->dropColumn('remember_token');
			
			$table->string('postal_Code')->nullable();
			$table->string('gardener_Role')->nullable();
			$table->integer('frost_id')->unsigned()->nullable();
			$table->foreign('frost_id')->references('id')->on('frosts');
			$table->boolean('remember_token');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gardeners', function($table) {
			$table->string('postal_Code');
			$table->string('gardener_Role');
			$table->integer('frost_id')->unsigned();
			$table->foreign('frost_id')->references('id')->on('frosts');
			$table->boolean('remember_token');
		});
	}

}
