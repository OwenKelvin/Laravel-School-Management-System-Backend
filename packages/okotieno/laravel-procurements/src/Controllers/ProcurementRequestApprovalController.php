<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementRequest;
use Okotieno\Procurement\Request\ProcurementRequestApprovalCreateRequest;
use Okotieno\Procurement\Request\ProcurementRequestCreateRequest;

class ProcurementRequestApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProcurementRequest::pendingApproval());
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
    public function store(ProcurementRequestApprovalCreateRequest $request)
    {
        ProcurementRequest::find($request->procurement_request_id)
            ->approved()
            ->create([
                'approved' => $request->approve,
                'approved_by' => auth()->id()
            ]);
        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProcurementRequest $procurementRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
