<?php

class GardenerTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('gardeners')->delete();
		$gardener = new Gardener;
		
		$gardener->fill(array(
				'email' => 'bill.brikiatis@comcast.net',
				'password' => Hash::make('Maine'),
				'gardener_Role' => 'Admin'
		));
		
		$gardener->save();
		
		DB::table('gardeners');
		$gardener = new Gardener;
		
		$gardener->fill(array(
				'email' => 'sylvie.brikiatis@comcast.net',
				'password' => Hash::make('Mass'),
		));
		
		$gardener->save();
		
		DB::table('gardeners');
		$gardener = new Gardener;
		
		$gardener->fill(array(
				'email' => 'Johanna@harvard.edu',
				'password' => Hash::make('NH'),
				'gardener_Role' => 'Admin'
		));
		
		$gardener->save();
		
	}

}