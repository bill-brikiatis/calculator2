<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantT extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plants', function($table) {

        // Increments method will make a Primary, Auto-Incrementing field.
        $table->increments('id');

        // This generates two columns: `created_at` and `updated_at` to
        // keep track of changes to a row
        $table->timestamps();

        // The rest of the fields...
        $table->string('plant_Name');
        $table->string('indoor_Offset_Days');
        $table->string('outdoor_Offset_Days');
        $table->string('direct_Sow');
		$table->string('plant_Indoors');
		$table->string('transplant_Offset_Days');

    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plants');
	}

}
