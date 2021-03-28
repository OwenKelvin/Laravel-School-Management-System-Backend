<?php

namespace Okotieno\TimeTable\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\TimeTable\Models\TimeTableTimingTemplate;

class TimingsTemplateController  extends Controller
{
    public function index() {
        $response = [];
        foreach (TimeTableTimingTemplate::all() as $item) {
            $item->timings;
            $response[] = $item;
        }
        return response()->json($response);
    }
    public function store(Request $request) {
        $template = TimeTableTimingTemplate::create([
            'description' => $request['description']
        ]);
        foreach ($request['timings'] as $timing) {
           $template->timings()->create($timing);
        }
        return response()->json([
           'saved' => true,
           'message' => 'Successfully saved timings template',
            'data' => $template
        ]);
    }
}
