<?php

use Illuminate\Database\Seeder;
use App\Models\Stadium;

class StadiumsTableSeeder extends Seeder
{
    private $datas = [
        [
            'city_id' => 1,
            'club_id' => 1,
            'name' => 'Stadion Gelora Bandung Lautan Api',
            'capacity' => 38000,
        ],
        [
            'city_id' => 2,
            'club_id' => 2,
            'name' => 'Stadion Surajaya',
            'capacity' => 14000,
        ],
        [
            'city_id' => 3,
            'club_id' => 3,
            'name' => 'Stadion Kanjuruhan',
            'capacity' => 40000,
        ],
        [
            'city_id' => 4,
            'club_id' => 4,
            'name' => 'Stadion Gelora Bung Tomo',
            'capacity' => 55000,
        ],
        [
            'city_id' => 5,
            'club_id' => 5,
            'name' => 'Stadion Jakabaring',
            'capacity' => 23000,
        ],
        [
            'city_id' => 6,
            'club_id' => 6,
            'name' => 'Stadion Mandala',
            'capacity' => 50000,
        ],
        [
            'city_id' => 7,
            'club_id' => 7,
            'name' => 'Stadion Aji Imbut',
            'capacity' => 35000,
        ],
        [
            'city_id' => 8,
            'club_id' => 8,
            'name' => 'Stadion Gelora Bung Karno',
            'capacity' => 77193,
        ],
        [
            'city_id' => 9,
            'club_id' => 9,
            'name' => 'Stadion Marora',
            'capacity' => 5000,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->datas as $data) {
            Stadium::create($data);
        }
    }
}
