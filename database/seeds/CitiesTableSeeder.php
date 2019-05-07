<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CitiesTableSeeder extends Seeder
{
    private $datas = [
        [
            'name' => 'Bandung',
        ],
        [
            'name' => 'Lamongan',
        ],
        [
            'name' => 'Malang',
        ],
        [
            'name' => 'Surabaya',
        ],
        [
            'name' => 'Palembang',
        ],
        [
            'name' => 'Jayapura',
        ],
        [
            'name' => 'Kutai Kartanegara',
        ],
        [
            'name' => 'Jakarta',
        ],
        [
            'name' => 'Serui',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::find(1);

        foreach ($this->datas as $data) {
            $country->cities()->create($data);
        }
    }
}
