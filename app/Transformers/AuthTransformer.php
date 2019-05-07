<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class AuthTransformer extends TransformerAbstract
{
    /**
     * Transform a user model for authentication.
     *
     * @param User $user
     * @return void
     */
    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'email' => $user->email,
        ];
    }
}
