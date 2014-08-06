<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserT extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        $table->increments('id');

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();

        // The rest of the fields...
        $table->string('postal_Code');
        $table->string('gardener_Email');
        $table->string('gardener_Password');
        $table->string('gardener_Role');
		$table->integer('frost_id')->unsigned();
		
		
		// Define foreign keys
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
		Schema::drop('users');
	}

}
