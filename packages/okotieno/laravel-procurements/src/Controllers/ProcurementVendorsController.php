<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementItemsCategory;
use Okotieno\Procurement\Models\ProcurementVendor;
use Okotieno\Procurement\Requests\ProcurementRequestCreateRequest;
//use Okotieno\Procurement\Requests\ProcurementProcurementVendorCreateRequest;
use Okotieno\Procurement\Requests\ProcurementVendorCreateRequest;

class ProcurementVendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(ProcurementVendor::all());
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProcurementVendorCreateRequest $request)
    {
        $created_request = ProcurementVendor::create([
            'name' => $request->name,
            'description' => $request->description,
            'physical_address' => $request->physical_address,
        ]);
        if ($request->contactInfo) {
            foreach ($request->contactInfo['emails'] as $email) {
                $created_request -> contacts() -> create([
                    'name' => $email['name'],
                    'value' => $email['value'],
                    'is_email' => true,
                    'is_phone' => false,
                ]);
            }
            foreach ($request->contactInfo['phones'] as $phone) {
                $created_request -> contacts() -> create([
                    'name' => $phone['name'],
                    'value' => $phone['value'],
                    'is_email' => false,
                    'is_phone' => true,
                ]);
            }
        }
        foreach ($request->procurement_items_categories as $category) {
            $category = ProcurementItemsCategory::find($category);
            $created_request -> delivers()->save($category);
        }

        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
            'vendor' => [
                'id' => $created_request->id,
                'name' => $created_request->name,
                'description' => $created_request->description,
                'physical_address' => $created_request->physical_address,
                'contacts' => $created_request->contacts
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
        $procurementRequest = ProcurementVendor::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        ProcurementVendor::destroy($id);
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Vendor deleted successfully'
        ]);
    }
}
