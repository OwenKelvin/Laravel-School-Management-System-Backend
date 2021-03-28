<?php

namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\TimeTable\Models\WeekDay;

class WeekDaysController extends Controller
{
    public function index()
    {
        return response()->json(WeekDay::all());
    }
}
