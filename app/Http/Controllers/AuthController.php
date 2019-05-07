<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exceptions\InvalidCredentialException;
use App\Transformers\AuthTransformer;

class AuthController extends RestController
{
    protected $transformer = AuthTransformer::class;

    public function auth(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->input('username'))->first();

            if (!password_verify($request->input('password'), $user->password)) {
                throw new InvalidCredentialException();
            }

            $item = $this->generateItem($user);

            return $this->sendResponse($item);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
