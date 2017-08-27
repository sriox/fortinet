<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class TestsController extends Controller
{
    public function activityTypesDepartmentTest()
    {
        $department = Department::find(1);
        dd($department->activityTypes);
    }
}
