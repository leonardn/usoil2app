<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CasinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 9; $x++) {
    		DB::table('casinos')->insert([
    			'casino_trade_name' => str_random(5).' Casino Trade',
    			'casino_email' => str_random(10).'@mt2015.com',
	            'casino_address1' => str_random(10).' Address 1',
	            'casino_address2' => '',
	            'casino_city' => str_random(10).' City',
	            'casino_state' => str_random(10).' State',
	            'casino_zipcode' => str_random(4),
	            'casino_phone' => str_random(10).'123',
	            'casino_phone_ext' => '',
	            'casino_ein' => str_random(5).' ein',
	            'account_payable_name' => str_random(10).' P Name',
	            'contact_person_title' => str_random(10).' P Title',
	            'contact_person_first_name' => str_random(5).' Fame',
	            'contact_person_last_name' => str_random(5).' Lame',
	            'contact_person_email' => '',
	            'contact_person_phone' => '',
	            'contact_person_phone_ext' => '',
	            'status' => '1',
    		]);
    	}
    }
}
