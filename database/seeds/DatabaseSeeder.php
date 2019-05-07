<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('ClubsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('StadiumsTableSeeder');
        $this->call('MatchesTableSeeder');
        $this->call('TicketsTableSeeder');
    }
}
