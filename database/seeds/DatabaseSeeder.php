<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 /*Model::unguard();
         //$this->call(UsersTableSeeder::class);
         $this->call(CasinoTableSeeder::class);
         $this->call(RestaurantTableSeeder::class);
    	 Model::reguard();*/

    	//DUMMY CASINO DATA
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

    	//DUMMY RESTAURANTS DATA
    	for ($x = 0; $x <= 9; $x++) {
    		DB::table('restaurants')->insert([
				'restaurant_name' => str_random(5).' Restaurant',
				'restaurant_location_code' => str_random(5).' Code',
				'restaurant_location' => str_random(10).' Location',
				'restaurant_location_lati' => '',
				'restaurant_location_long' => '',
				'contact_person_title' => str_random(5).' P Title',
				'contact_person_first_name' => str_random(5).' Fame',
				'contact_person_last_name' => str_random(5).' Lame',
				'contact_person_email' => '',
				'contact_person_phone' => '',
				'contact_person_phone_ext' => '',
				'activation_date' => new DateTime,
				'status' => '1',
	        ]);
		}
		
		//DUMMY MACHINES DATA
    	for ($x = 0; $x <= 9; $x++) {
    		DB::table('machines')->insert([
				'machine_name' => str_random(5).' Machine',
				'machine_type' => str_random(5).' Type',
				'status' => '1',
	        ]);
		}
		
		//DUMMY CORPORATION DATA
    	for ($x = 0; $x <= 9; $x++) {
    		DB::table('corporations')->insert([
				'corporation_name' => str_random(5).' Corp',
				'status' => '1',
	        ]);
		}
		
		//DUMMY FRYER DATA
    	for ($x = 0; $x <= 9; $x++) {
    		DB::table('fryers')->insert([
				'fryer_name' => 'Fryer '.$x,
				'status' => '1',
	        ]);
		}
		
		//DUMMY LOG OPTION DATA
    	for ($x = 0; $x <= 9; $x++) {
    		DB::table('log_options')->insert([
				'option_title' => 'Log Option '.$x,
				'status' => '1',
	        ]);
		}
    }
}
