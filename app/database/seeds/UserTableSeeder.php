<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'postal_Code'     => '03087',
			'gardener_Email' => 'bill.brikiatis@comcast.net',
			'gardener_Password' => Hash::make('Maine'),
			'frost_id' => 14
		));
	}

}