<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'Afgan',
                'phone' => '994513739930'
            ],
            [
                'name' => 'Andrey',
                'phone' => '994503918076'
            ],
            [
                'name' => 'Aleksey',
                'phone' => '994503229080'
            ],            
        ]);
    }
}
