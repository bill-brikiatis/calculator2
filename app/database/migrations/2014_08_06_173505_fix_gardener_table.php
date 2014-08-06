<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixGardenerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gardeners', function($table) {

       $table->string('postal_Code')->nullable();
	   $table->unique('postal_Code');
       $table->renameColumn('gardener_Email', 'email');
	   $table->unique('email');
	   $table->renameColumn('gardener_password', 'password');
	   $table->boolean('remember_token');
	   $table->integer('frost_id')->nullable();

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
				
		$table->dropColumn('postal_Code');
		$table->string('postal_Code');
		$table->dropColumn('email');
		$table->string('gardener_Email');
		$table->renameColumn('password', 'gardener_password');
		$table->dropColumn('remember_token');
		$table->dropColumn('frost_id');
		$table->integer('frost_id')->unsigned();
		
		});
	}

}
