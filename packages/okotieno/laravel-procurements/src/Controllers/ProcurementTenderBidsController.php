<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementBid;
use Okotieno\Procurement\Models\ProcurementTender;
use Okotieno\Procurement\Request\ProcurementBidCreateRequest;

class ProcurementTenderBidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProcurementTender $procurementTender
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProcurementTender $procurementTender)
    {
        return response()->json($procurementTender->procurementRequest->bids);
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
     * @param ProcurementBidCreateRequest $request
     * @param ProcurementTender $procurementTender
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProcurementBidCreateRequest $request, ProcurementTender $procurementTender)
    {
        $bid = $procurementTender->procurementTenderBids()->create([
            'price_per_unit' => $request->price_per_unit,
            'description' => $request->description,
            'unit_description' => $request->unit_description,
            'vendor_id' => $request->vendor_id,
        ]);

        return response()->json([
            'saved' => true,
            'message' => 'Procurement Bid Successfully',
            'data' => $bid
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
//        $procurementRequest = ProcurementVendor::find($id);
//        return $procurementRequest;
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
     * @return \Illuminate\Http\jsonResponse
     */
    public function update(Request $request, $tenderId, $bidId)
    {
        // TODO-me validate if user can('approve procurement tender')
        $bid = ProcurementBid::find($bidId);
        $bid->awarded = $request->awarded;
        $bid->save();
        return response()->json([
            'saved' => 'true',
            'message' => 'Bid Successfully awarded',
            'data' => $bid
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\jsonResponse
     */
    public function destroy($id)
    {
        // ProcurementVendor::destroy($id);
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Tender deleted successfully'
        ]);
    }
}
