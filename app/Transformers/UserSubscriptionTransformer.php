<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Subscription;

class UserSubscriptionTransformer extends TransformerAbstract
{
    public function transform(Subscription $subs)
    {
        return [
            'user_id' => $subs->user_id,
            'clubs' => $subs->clubs,
        ];
    }
}
