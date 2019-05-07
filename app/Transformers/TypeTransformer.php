<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Type;

class TypeTransformer extends TransformerAbstract
{
    public function transform(Type $type)
    {
        return [
            'id' => $type->id,
            'name' => $type->name,
        ];
    }
}
