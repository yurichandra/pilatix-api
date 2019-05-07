<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\City;

class CityTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'country',
    ];

    /**
     * Transform City model.
     *
     * @param City $city
     * @return void
     */
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
        ];
    }

    /**
     * Include Country model when transform
     *
     * @param City $city
     * @return void
     */
    public function includeCountry(City $city)
    {
        return $this->item($city->country, new CountryTransformer);
    }
}
