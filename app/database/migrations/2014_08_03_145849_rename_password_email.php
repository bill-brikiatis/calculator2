<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePasswordEmail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gardeners', function($table) {
			$table->renameColumn('gardener_Email', 'email');
			$table->renameColumn('gardener_password', 'password');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->renameColumn('email', 'gardener_Email');
		$table->renameColumn('password', 'gardener_password');
	}

}
