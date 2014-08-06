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
			$table->dropColumn('remember_token');
			$table->boolean('remember_token');
			$table->dropColumn('postal_Code');
			$table->string('postal_Code')->nullable();
			$table->dropColumn('gardener_Role');
	}

}
