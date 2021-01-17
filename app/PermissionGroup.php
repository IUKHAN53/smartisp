<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class PermissionGroup extends Model
{
    use HasPermissions;
    protected $guard_name = 'web';
    protected $guarded = [];

}
