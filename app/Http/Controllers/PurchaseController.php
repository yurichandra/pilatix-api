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
                'details' => 'required',
            ]);

            $details = $request->input('details');

            $purchase_details = collect($details)
                ->map(function ($item) {
                    return new PurchaseDetail([
                        'ticket_id' => $item['ticketId'],
                        'price' => $item['price'],
                        'total' => $item['total'],
                        'subtotal' => $item['total'] * $item['price'],
                    ]);
                });

            $purchase_total = collect($details)
                ->reduce(function ($carry, $item) {
                    return $carry + ($item['total'] * $item['price']);
                }, 0);

            $data = [
                'user_id' => $request->userId,
                'paid' => false,
                'date' => Carbon::now(),
                'total' => $purchase_total,
                'details' => $purchase_details,
                'unique_code' => str_random(6),
            ];

            $purchase = DB::transaction(function () use ($data) {
                $purchase = Purchase::create($data);
                $purchase->details()->saveMany($data['details']);

                return $purchase;
            });

            $item = $this->generateItem($purchase);

            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
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
