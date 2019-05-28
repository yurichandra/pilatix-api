<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Transformers\TicketTransformer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketController extends RestController
{
    protected $transformer = TicketTransformer::class;

    /**
     * Return all tickets available.
     *
     * @return void
     */
    public function get()
    {
        try {
            $collection = $this->generateCollection(Ticket::get());

            return $this->sendResponse($collection);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Store a new ticket.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'matchId' => 'required',
                'typeId' => 'required',
                'categoryId' => 'required',
                'price' => 'required',
            ]);

            $ticket = Ticket::create([
                'match_id' => $request->matchId,
                'type_id' => $request->typeId,
                'category_id' => $request->categoryId,
                'price' => $request->price,
            ]);

            $item = $this->generateItem($ticket);

            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Update a ticket
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'typeId' => 'required',
                'categoryId' => 'required',
            ]);

            $ticket = Ticket::findOrFail($id);

            $ticket->update([
                'type_id' => $request->typeId,
                'category_id' => $request->categoryId,
            ]);

            $item = $this->generateItem($ticket->refresh());

            return $this->sendResponse($item);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Delete a ticket
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);

            $ticket->delete();

            return $this->sendResponse();
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
