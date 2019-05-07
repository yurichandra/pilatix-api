<?php

use Illuminate\Database\Seeder;
use App\Models\Match;

class MatchesTableSeeder extends Seeder
{
    private $datas = [
        [
            'id' => 1,
            'home_team_id' => 1,
            'away_team_id' => 2,
            'stadium_id' => 1,
            'date' => '2019-03-10',
        ],
        [
            'id' => 2,
            'home_team_id' => 3,
            'away_team_id' => 4,
            'stadium_id' => 3,
            'date' => '2019-03-10',
        ],
        [
            'id' => 3,
            'home_team_id' => 5,
            'away_team_id' => 6,
            'stadium_id' => 5,
            'date' => '2019-03-10',
        ],
        [
            'id' => 4,
            'home_team_id' => 7,
            'away_team_id' => 8,
            'stadium_id' => 7,
            'date' => '2019-03-10',
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
            if (is_null(Match::find($data['id']))) {
                Match::create($data);
            }
        }
    }
}
