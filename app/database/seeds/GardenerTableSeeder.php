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
	}

}