<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class ClubsTableSeeder extends Seeder
{
    private $datas = [
        [
            'name' => 'Persib Bandung',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/1.+PERSIB.png',
        ],
        [
            'name' => 'Persela Lamongan',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/2.+PERSELA.png',
        ],
        [
            'name' => 'Arema Malang',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/3.+AREMA.png',
        ],
        [
            'name' => 'Persebaya Surabaya',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/4.+PERSEBAYA.png',
        ],
        [
            'name' => 'Sriwijaya FC Palembang',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/5.+SRIWIJAYA.png',
        ],
        [
            'name' => 'Persipura Jayapura',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/6.+PERSIPURA.png',
        ],
        [
            'name' => 'Mitra Kukar',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/7.+%2CMITRA+KUKAR.png',
        ],
        [
            'name' => 'Persija Jakarta',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/8.+PERSIJA.png',
        ],
        [
            'name' => 'Perseru Serui',
            'photo' => 'https://s3.us-east-2.amazonaws.com/pilatix-api-clubs/10.+PERSERU.png',
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
