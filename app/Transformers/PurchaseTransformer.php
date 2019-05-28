<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Purchase;

class PurchaseTransformer extends TransformerAbstract
{
    /**
     * Add default includes of model
     *
     * @var array
     */
    protected $defaultIncludes = [
        'details',
    ];

    /**
     * Transform the model
     *
     * @param Purchase $purchase
     * @return void
     */
    public function transform(Purchase $purchase)
    {
        return [
            'id' => $purchase->id,
            'uniqueCode' => $purchase->unique_code,
            'date' => $purchase->date,
            'total' => $purchase->total,
        ];
    }

    /**
     * Including detail models.
     *
     * @param Purchase $purchase
     * @return void
     */
    public function includeDetails(Purchase $purchase)
    {
        return $this->collection($purchase->details, new PurchaseDetailTransformer);
    }
}
