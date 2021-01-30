<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    protected $guarded = [];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
