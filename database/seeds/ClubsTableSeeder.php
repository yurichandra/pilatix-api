<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class ClubsTableSeeder extends Seeder
{
    private $datas = [
        [
            'name' => 'Persib Bandung',
        ],
        [
            'name' => 'Persela Lamongan',
        ],
        [
            'name' => 'Arema Malang',
        ],
        [
            'name' => 'Persebaya Surabaya',
        ],
        [
            'name' => 'Sriwijaya FC Palembang',
        ],
        [
            'name' => 'Persipura Jayapura',
        ],
        [
            'name' => 'Mitra Kukar',
        ],
        [
            'name' => 'Persija Jakarta',
        ],
        [
            'name' => 'Perseru Serui',
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
            $country->clubs()->create($data);
        }
    }
}
