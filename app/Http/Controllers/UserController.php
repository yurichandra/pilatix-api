<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Models\User;

class UserController extends RestController
{
    protected $transformer = UserTransformer::class;

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required',
                'name' => 'required',
                'address' => 'required',
                'phoneNumber' => 'required',
            ]);

            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => app('hash')->make($request->input('password')),
            ]);

            $user->personal()->create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('phoneNumber'),
            ]);

            $item = $this->generateItem($user);
            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
