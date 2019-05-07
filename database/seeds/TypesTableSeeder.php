<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    private $datas = [
        [
            'name' => 'Tiket Terusan',
        ],
        [
            'name' => 'Tiket Pertandingan',
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
            Type::create($data);
        }
    }
}
