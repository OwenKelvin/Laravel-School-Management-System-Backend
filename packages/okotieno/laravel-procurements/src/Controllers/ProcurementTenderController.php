<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementRequest;
use Okotieno\Procurement\Models\ProcurementTender;
use Okotieno\Procurement\Request\ProcurementTenderCreateRequest;

class ProcurementTenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->awarded == true){
            $procurementTenders = ProcurementTender::awarded()->get();

            return response()->json($procurementTenders->map( function ($procurementTender) {
                $awardedBid = $procurementTender->bids->filter(function ($bid) {
                    return $bid['awarded'] == true;
                })[0];
                $procurementRequest = $procurementTender->procurementRequest;

                return [
                    'id' => $procurementTender['id'],
                    'requested_item_name' => $procurementRequest['name'],
                    'request_id' => $procurementRequest['id'],
                    'vendor_name' => $awardedBid['vendor_name'],
                    'vendor_id' => $awardedBid['vendor_id'],
                    'quantity' => $awardedBid['vendor_id']];
            }));
        }

        return response()->json(ProcurementRequest::approvedForBidding());
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
     * @param ProcurementTenderCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcurementTenderCreateRequest $request)
    {
        $created_request = ProcurementTender::create([
            'procurement_request_id' => $request->procurement_request_id,
            'expiry_datetime' => Carbon::createFromDate($request->expiry_datetime),
            'description' => $request->description
        ]);
        return response()->json([
            'saved' => true,
            'message' => 'Tender created Successfully',
            'tender' => [
                'id' => $created_request->id
            ]
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $procurementTender = ProcurementTender::find($id);
        if ($request->awarded_to !== null) {
            $procurementTender->awarded_to = $request->awarded_to;
        }
        $procurementTender->save();
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Tender successfully updated'
        ]);
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
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Tender deleted successfully'
        ]);
    }
}
