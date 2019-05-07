<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Stadium;

class StadiumTransformer extends TransformerAbstract
{
    /**
     * Transform Stadium model.
     *
     * @param Stadium $stadium
     * @return void
     */
    public function transform(Stadium $stadium)
    {
        return [
            'id' => $stadium->id,
            'name' => $stadium->name,
        ];
    }
}
