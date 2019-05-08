<?php

namespace App\Http\Controllers;

use App\Transformers\MatchTransformer;
use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    /**
     * Store a new match
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'homeTeamId' => 'required',
                'awayTeamId' => 'required',
                'stadiumId' => 'required',
                'date' => 'required',
            ]);

            $match = Match::create([
                'home_team_id' => $request->homeTeamId,
                'away_team_id' => $request->awayTeamId,
                'stadium_id' => $request->stadiumId,
                'date' => $request->date,
            ]);

            $item = $this->generateItem($match);

            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Update a match by ID
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'homeTeamId' => 'required',
                'awayTeamId' => 'required',
                'stadiumId' => 'required',
                'date' => 'required',
            ]);

            $match = Match::findOrFail($id);

            $match->update([
                'home_team_id' => $request->homeTeamId,
                'away_team_id' => $request->awayTeamId,
                'stadium_id' => $request->stadiumId,
                'date' => $request->date,
            ]);

            $item = $this->generateItem($match);

            return $this->sendResponse($item);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Delete a match
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            $match = Match::findOrFail($id);

            $match->delete();

            return $this->sendResponse();
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
