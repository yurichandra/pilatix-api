<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Purchase;
use App\Transformers\PurchaseTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PurchaseController extends RestController
{
    protected $transformer = PurchaseTransformer::class;

    /**
     * Return all purchases.
     *
     * @return void
     */
    public function get()
    {
        try {
            $collection = $this->generateCollection(Purchase::get());
            
            return $this->sendResponse($collection);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Store a new purchase.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'userId' => 'required',
            ]);

            $total = $request->price * $request->total;

            $data = [
                'user_id' => $request->userId,
                'paid' => false,
                'date' => Carbon::now(),
                'total' => $total,
                'ticket_id' => $request->ticketId,
                'unique_code' => str_random(6),
            ];

            $purchase = DB::transaction(function () use ($data, $request) {
                $purchase = Purchase::create($data);
                $purchase->details()->create([
                    'ticket_id' => $data['ticket_id'],
                    'total' => $request->total,
                    'price' => $request->price,
                    'subtotal' => $data['total'],
                ]);

                return $purchase;
            });

            $item = $this->generateItem($purchase);

            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Get all purchases by a user.
     *
     * @param [type] $id
     * @return void
     */
    public function getByUser($id)
    {
        try {
            $purchases = Purchase::where('user_id', $id)->get();
            $collection = $this->generateCollection($purchases);

            return $this->sendResponse($collection);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
