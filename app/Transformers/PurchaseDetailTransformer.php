<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PurchaseDetail;

class PurchaseDetailTransformer extends TransformerAbstract
{
    /**
     * Set default includes.
     *
     * @var array
     */
    protected $defaultIncludes = [
        'tickets',
    ];

    /**
     * Transform PurchaseDetail model
     *
     * @param PurchaseDetail $detail
     * @return void
     */
    public function transform(PurchaseDetail $detail)
    {
        return [
            'id' => $detail->id,
            'total' => $detail->total,
            'price' => $detail->price,
            'subtotal' => $detail->subtotal,
        ];
    }

    /**
     * Include tickets model.
     *
     * @param PurchaseDetail $detail
     * @return void
     */
    public function includeTickets(PurchaseDetail $detail)
    {
        return $this->item($detail->ticket, new TicketTransformer);
    }
}
