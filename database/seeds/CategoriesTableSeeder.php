<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    private $datas = [
        [
            'name' => 'VIP',
        ],
        [
            'name' => 'Ekonomi',
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
            Category::create($data);
        }
    }
}
