<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];


    function position()
    {
        return $this->belongsTo(Position::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function supervisor()
    {
        return $this->belongsTo(Employee::class);
    }

    function leaves()
    {
        return $this->hasMany(EmployeeLeave::class);
    }

}
