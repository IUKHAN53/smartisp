<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    protected $guarded = [];

    function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    function leave()
    {
        return $this->belongsTo(Leave::class);
    }
}
