<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Ticket;

class TicketTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'match',
        'type',
        'category',
    ];

    public function transform(Ticket $ticket)
    {
        return [
            'id' => $ticket->id,
            'price' => $ticket->price,
        ];
    }

    public function includeMatch(Ticket $ticket)
    {
        return $this->item($ticket->match, new MatchTransformer);
    }

    public function includeType(Ticket $ticket)
    {
        return $this->item($ticket->type, new TypeTransformer);
    }

    public function includeCategory(Ticket $ticket)
    {
        return $this->item($ticket->category, new CategoryTransformer);
    }
}
