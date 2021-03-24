<?php
/**
 * Created by IntelliJ IDEA.
 * User: oko
 * Date: 2/10/2020
 * Time: 10:29 PM
 */

namespace Okotieno\SchoolInfrastructure\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Okotieno\SchoolInfrastructure\Models\Room;

class RoomsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $response = [];
        return response()->json(
            Room::all()
        );
    }

    /**
     *
     * @param Room $room
     * @return JsonResponse
     */

    public function show(Room $room) {

        return response()->json($room);
    }
    public function store(Request $request)
    {

        $newRoom = Room::create([
            'name' => $request->name,
            'created_by' => auth()->id()
        ]);

        return [
            'saved' => true,
            'message' => 'Room Successfully saved',
            'data' => $newRoom
        ];
    }

    /**
     * @param Room $room
     * @return array
     * @throws \Exception
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return [
            'saved' => true,
            'message' => 'Room Successfully deleted'
        ];
    }
}
