<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create('frost', function($table) {
			
		// Increments method will make a Primary, Auto-Incrementing field.
        $table->increments('frost_id')->unsigned();

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();

        // The rest of the fields...
        $table->string('postal_Code');
        $table->string('last_Frost_Date');
		
		});
		
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::drop('frost');
	}

}