<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Club;

class ClubTransformer extends TransformerAbstract
{
    /**
     * Transform Club model.
     *
     * @param Club $club
     * @return void
     */
    public function transform(Club $club)
    {
        return [
            'id' => $club->id,
            'name' => $club->name,
        ];
    }
}
