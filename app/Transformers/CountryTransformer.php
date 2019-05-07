<?php

namespace App\Transformers;

use App\Models\Country;

class CountryTransformer extends TransformerAbstract
{
    /**
     * Transform Country model.
     *
     * @param Country $country
     * @return void
     */
    public function transform(Country $country)
    {
        return [
            'id' => $country->id,
            'name' => $country->name,
        ];
    }
}
