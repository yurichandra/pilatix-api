<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    /**
     * Attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'purchase_id',
        'ticket_id',
        'total',
        'price',
        'subtotal',
    ];

    /**
     * Casts attributes
     *
     * @var array
     */
    protected $casts = [
        'total' => 'double',
        'subtotal' => 'double',
    ];

    /**
     * Define relation to purchase model
     *
     * @return void
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    /**
     * Define relation to ticket model
     *
     * @return void
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
