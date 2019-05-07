<?php

namespace App\Http\Controllers;

use App\Transformers\ClubTransformer;
use App\Models\Club;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    /**
     * Get all tickets by club ID.
     *
     * @param int $id
     * @return void
     */
    public function getTicketsByClub($id)
    {
        try {
            $clubs = Club::findOrFail($id);

            $home_match_tickets = $clubs->homeMatches
                ->map(function ($item) {
                    return $item->tickets;
                });
            
            $away_match_tickets = $clubs->awayMatches
                ->map(function ($item) {
                    return $item->tickets;
                });

            
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
