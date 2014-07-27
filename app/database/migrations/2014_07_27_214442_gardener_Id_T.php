<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GardenerIdT extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create('users', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        $table->increments('gardner_Id');

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();

        // The rest of the fields...
        $table->string('postal_Code');
        $table->string('gardner_Email');
        $table->string('gardner_Password');
        $table->string('gardner_role');

    });

}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::drop('users');
	}

}
