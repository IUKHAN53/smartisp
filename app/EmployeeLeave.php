<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    protected $guarded = [];
    function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
