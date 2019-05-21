<?php

namespace App\Http\Controllers;

use App\Transformers\ClubTransformer;
use App\Models\Club;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Ticket;
use App\Transformers\TicketTransformer;

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

            $home_match_ids = $clubs->homeMatches
                ->map(function ($item) {
                    return $item->id;
                });
            
            $away_match_ids = $clubs->awayMatches
                ->map(function ($item) {
                    return $item->id;
                });

            $home_match_ids->merge($away_match_ids);

            $tickets = collect($home_match_ids)
                ->map(function ($item) {
                    return Ticket::where('match_id', $item)->first();
                });

            $collection = $this->generateCollection($tickets, new TicketTransformer);

            return $this->sendResponse($collection);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
