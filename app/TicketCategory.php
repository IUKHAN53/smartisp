<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $guarded = [];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
