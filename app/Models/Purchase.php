<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    /**
     * Attributes that mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'paid',
        'unique_code',
        'date',
        'total',
    ];

    /**
     * Cast an dates attribute.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Cast attributes.
     *
     * @var array
     */
    protected $casts = [
        'total' => 'double',
    ];

    /**
     * Define relation with PurchaseDetail
     *
     * @return void
     */
    public function details()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }
}
