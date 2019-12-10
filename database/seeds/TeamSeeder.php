<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams')->truncate();
        \DB::table('teams')->insert([
           [ 'name' => ' Lobi Stars FC'],
            ['name' => 'Ifeanyi Ubah United',],
            ['name' => 'Akwa United',],
            ['name' => 'Kano Pillars',],
            ['name' => 'Enugu Rangers',],
            ['name' => 'Enyimba',],
            ['name' => 'Wikki Tourists',],
            ['name' => 'Sunshine Stars FC',],
            ['name' => 'Abia Warriors',],
            ['name' => 'Nasarawa United',],
            ['name' => 'Plateau United',],
            ['name' => 'MFM FC',],
            ['name' => 'Rivers United',],
            ['name' => 'Heartland FC',],
            ['name' => 'El Kanemi Warriors',],
            ['name' => 'Katsina Utd',],
            ['name' => 'Niger Tornadoes',],
            ['name' => 'Warri Wolves FC',],
            ['name' => 'Shooting Stars',],
            ['name' => 'Kwara United',],
            ['name' => 'Remo Stars',],
            ['name' => 'Gombe Utd',],
            ['name' => 'Kada City FC',],
            ['name' => 'Yobe Desert Stars',],
            ['name' => 'Go Round FC',],
            ['name' => 'ABS FC',],
            ['name' => 'Akwa Starlets',],
            ['name' => 'Adamawa United FC',],
            ['name' => 'Jigawa Golden Stars',],
            ['name' => 'Ikorodu Utd',],
            ['name' => 'Bendel Insurance',]
        ]);
    }
}