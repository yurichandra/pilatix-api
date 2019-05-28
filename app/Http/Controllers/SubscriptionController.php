<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Transformers\SubscriptionTransformer;
use App\Models\Club;
use App\Transformers\UserSubscriptionTransformer;

class SubscriptionController extends RestController
{
    protected $transformer = SubscriptionTransformer::class;

    /**
     * Store a new subscription.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'userId' => 'required',
                'clubId' => 'required',
            ]);

            $subs = Subscription::create([
                'user_id' => $request->userId,
                'club_id' => $request->clubId,
                'start_date' => Carbon::now(),
            ]);

            $item = $this->generateItem($subs);

            return $this->sendResponse($item, 201);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Get subscription by a user.
     *
     * @param int $id
     * @return void
     */
    public function getByUser($id)
    {
        try {
            $subs = Subscription::where('user_id', $id)
                ->get()
                ->map(function ($item) {
                    $item->clubs = Club::find($item->club_id);

                    return $item;
                });

            $collection = $this->generateCollection($subs, UserSubscriptionTransformer::class);

            return $this->sendResponse($collection);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse($e->getMessage());
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
