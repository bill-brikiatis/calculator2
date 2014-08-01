<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePostalUnique extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::table('frosts', function($table) {
		 	$table->unique('postal_Code');
		 }
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		  Schema::table('frosts', function($table) {
		  	$table->dropColumn('postal_Code');
			$table->string('postal_Code');
		  });
	}
	
}