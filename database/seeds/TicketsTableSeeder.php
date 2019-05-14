<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    private $datas = [
        [
            'id' => 1,
            'match_id' => 1,
            'category_id' => 2,
            'type_id' => 2,
            'price' => 150000,
        ],
        [
            'id' => 2,
            'match_id' => 2,
            'category_id' => 2,
            'type_id' => 2,
            'price' => 75000,
        ],
        [
            'id' => 3,
            'match_id' => 3,
            'category_id' => 2,
            'type_id' => 2,
            'price' => 80000,
        ],
        [
            'id' => 4,
            'match_id' => 4,
            'category_id' => 2,
            'type_id' => 2,
            'price' => 50000,
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
            if (is_null(Ticket::find($data['id']))) {
                Ticket::create($data);
            }
        }
    }
}
