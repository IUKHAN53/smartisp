<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketLog extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
