<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Index view of backend service
     *
     * @return void
     */
    public function index()
    {
        return response()->json(['name' => 'Pilatix API']);
    }
}
