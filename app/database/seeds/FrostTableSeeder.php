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
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01001',
				'last_Frost_Date' => 'May 5, 2015'
		));
		
		$frost->save();
		
		
		$frost->save();
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01002',
				'last_Frost_Date' => 'May 11, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01003',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01004',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01005',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01007',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01008',
				'last_Frost_Date' => 'May 12, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01010',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01011',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01012',
				'last_Frost_Date' => 'May 1, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01013',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01014',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
		
		
		DB::table('frosts');
		$frost = new Frost;
		
		$frost->fill(array(
				'postal_Code' => '01020',
				'last_Frost_Date' => 'May 15, 2015'
		));
		
		$frost->save();
  }

}