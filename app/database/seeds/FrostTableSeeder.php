<?php
 
class FrostTableSeeder extends Seeder {
 
  public function run()
  {
  		DB::table('frosts')->delete();
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '03087',
				'last_Frost_Date' => 'May 11, 2015'
		));
		
		$frost->save();
  }
 
}