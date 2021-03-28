<?php


namespace Okotieno\SchoolStreams\Controllers;

use App\Http\Controllers\Controller;
use Okotieno\SchoolStreams\Models\Stream;

class SchoolStreamsController extends Controller
{
    public function index()
    {
        return response()->json(Stream::all());
    }

}
