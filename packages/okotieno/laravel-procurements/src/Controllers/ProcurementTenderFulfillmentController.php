<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementFulfill;
use Okotieno\Procurement\Models\ProcurementTender;
use Okotieno\Procurement\Request\ProcurementTenderCreateRequest;

class ProcurementTenderFulfillmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return response()->json([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param ProcurementTender $procurementTender
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProcurementTender $procurementTender)
    {
        if ($procurementTender->fulfilled !== null) {
            abort(409, 'Item fulfilment already set');
        }
        $created_request = $procurementTender->fulfilled()->create([
            'comment' => 'comment',
            'fulfilled' => $request->fulfilled,
            'entered_by' => auth()->id()
        ]);
        $message = 'Tender Marked as Fulfilled Successfully';
        if ($request->fulfilled == 0) {
            $message = 'Tender Marked as Not Fulfilled Successfully';
        }
        return response()->json([
            'saved' => true,
            'message' => $message,
            'fulfill' => $created_request
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $procurementRequest = ProcurementVendor::find($id);
//        return $procurementRequest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        $procurementTender = ProcurementTender::find($id);
//        if ($request->awarded_to !== null) {
//            $procurementTender->awarded_to = $request->awarded_to;
//        }
//        $procurementTender->save();
//        return response()->json([
//            'saved' => true,
//            'message' => 'Procurement Tender successfully updated'
//        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ProcurementVendor::destroy($id);
//        return response()->json([
//            'saved' => true,
//            'message' => 'Procurement Tender deleted successfully'
//        ]);
    }
}
