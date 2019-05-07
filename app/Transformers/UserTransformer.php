<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * Transform a user model.
     *
     * @param User $user
     * @return void
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->personal->name,
            'email' => $user->email,
            'phoneNumber' => $user->personal->phone_number,
            'username' => $user->username,
        ];
    }
}
