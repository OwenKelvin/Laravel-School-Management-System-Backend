<?php

namespace Okotieno\Procurement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Okotieno\Procurement\Models\ProcurementItemsCategory;
use Okotieno\Procurement\Models\ProcurementRequest;
use Okotieno\Procurement\Request\ProcurementItemsCategoryCreateRequest;
use Okotieno\Procurement\Request\ProcurementRequestCreateRequest;

class ProcurementItemsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProcurementItemsCategory::all());
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
    public function store(ProcurementItemsCategoryCreateRequest $request)
    {

        $created_request = ProcurementItemsCategory::create([
            'name' => $request->name,
        ]);
        return response()->json([
            'saved' => true,
            'message' => 'Book saved Successfully',
            'book' => [
                'id' => $created_request->id,
                'name' => $created_request->name
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
        //
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
    public function destroy(ProcurementItemsCategory $procurementItemsCategory)
    {
        ProcurementRequest::destroy($procurementItemsCategory->id);
        return response()->json([
            'saved' => true,
            'message' => 'Procurement Item Category Successfully deletes'
        ]);
    }
}
