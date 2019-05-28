<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Subscription;

class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * Transform Subscription model.
     *
     * @param Subscription $subs
     * @return void
     */
    public function transform(Subscription $subs)
    {
        return [
            'id' => $subs->id,
            'clubs' => $subs->clubs,
        ];
    }
}
