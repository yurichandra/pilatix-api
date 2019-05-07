<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Match;

class MatchTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'homeTeam',
        'awayTeam',
        'stadium',
    ];

    /**
     * Transform Match model.
     *
     * @param Match $match
     * @return void
     */
    public function transform(Match $match)
    {
        return [
            'id' => $match->id,
            'date' => $match->date,
        ];
    }

    /**
     * Include home team model.
     *
     * @param Match $match
     * @return void
     */
    public function includeHomeTeam(Match $match)
    {
        return $this->item($match->homeTeam, new ClubTransformer);
    }

    /**
     * Include away team model.
     *
     * @param Match $match
     * @return void
     */
    public function includeAwayTeam(Match $match)
    {
        return $this->item($match->awayTeam, new ClubTransformer);
    }

    /**
     * Include Stadium model.
     *
     * @param Match $match
     * @return void
     */
    public function includeStadium(Match $match)
    {
        return $this->item($match->stadium, new StadiumTransformer);
    }
}
