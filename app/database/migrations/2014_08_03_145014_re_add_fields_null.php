<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReAddFieldsNull extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gardeners', function($table) {
			
			$table->dropColumn('remember_token');
		});
		
		Schema::table('gardeners', function($table) {
			$table->boolean('remember_token')->nullable();
			$table->dropColumn('postal_Code');
			$table->string('postal_Code')->nullable();
			$table->dropColumn('gardener_Role');
			$table->string('gardener_Role')->nullable();
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
			$table->boolean('remember_token');
		});
		
		Schema::table('gardeners', function($table) {
			$table->dropColumn('postal_Code');
			$table->string('postal_Code');
			$table->dropColumn('gardener_Role');
			$table->string('gardener_Role');
		});
	}

}
