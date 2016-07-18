<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
				'activation_date' => date('d/m/Y'),
				'status' => '1',
	        ]);
		}
    }
}
