<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function ticket_comments()
    {
        return $this->hasMany(TicketComments::class);
    }

    public function ticket_category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function assigned_to()
    {
        return $this->hasOne(User::class, 'id','assigned_to_id');
    }

    public function ticket_by()
    {
        return $this->hasOne(User::class, 'id', 'ticket_by_id');
    }


}
