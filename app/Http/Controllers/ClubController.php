<?php

namespace App\Http\Controllers;

use App\Transformers\ClubTransformer;
use App\Models\Club;

class ClubController extends RestController
{
    protected $transformer = ClubTransformer::class;

    /**
     * Return all clubs available.
     *
     * @return void
     */
    public function get()
    {
        try {
            $collection = $this->generateCollection(Club::get());

            return $this->sendResponse($collection);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
