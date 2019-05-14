<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'match_id',
        'category_id',
        'type_id',
        'price',
    ];

    protected $casts = [
        'price' => 'double',
    ];

    /**
     * Define relation with Match model.
     *
     * @return void
     */
    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
