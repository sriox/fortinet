<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType_Department extends Model
{
    protected $table = 'activity_type_department';
    protected $fillable = ['activity_type_id', 'department_id'];
}
