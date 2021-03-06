<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementRequest;
use Okotieno\Procurement\Requests\ProcurementRequestCreateRequest;

class ProcurementRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param ProcurementRequestCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcurementRequestCreateRequest $request)
    {

        $created_request = ProcurementRequest::create([
            'name' => $request->name,
            'procurement_items_category_id' => $request->procurement_items_category_id,
            'quantity_description' => $request->quantity_description,
            'description' => $request->description,
            'requested_by' => auth()->id()
        ]);
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Requests created Successfully',
            'data' => $created_request
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procurementRequest = ProcurementRequest::find($id);
        $procurementRequest->user;
        return $procurementRequest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = ProcurementRequest::find($id);
        $updated ->update($request->all());
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Requests updated Successfully',
            'data' => $updated
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProcurementRequest $procurementRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProcurementRequest::destroy($id);
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Requests deleted successfully'
        ]);
    }
}
