<?php

namespace App\Http\Controllers;

use App\Transformers\MatchTransformer;
use App\Models\Match;

class MatchController extends RestController
{
    protected $transformer = MatchTransformer::class;

    /**
     * Return all matches available.
     *
     * @return void
     */
    public function get()
    {
        try {
            $collection = Match::get();
            $model = $this->generateCollection($collection);

            return $this->sendResponse($model);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
