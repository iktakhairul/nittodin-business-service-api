<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessIdenticalDocumentsResource;
use App\Http\Resources\BusinessIdenticalDocumentsResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessIdenticalDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessIdenticalDocumentsResourceCollection
     */
    public function index(Request $request)
    {
        $businessIdenticalDocuments = DB::table('business_identical_documents')->get();

        return new BusinessIdenticalDocumentsResourceCollection($businessIdenticalDocuments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessIdenticalDocumentsResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'business_id'      => 'required',
        ]);

        $data = [
            'business_id'         => $request['business_id'],
            'trade_license_no'    => $request['trade_license_no'],
            'trade_license_image' => $request['trade_license_image'],
            'tin'                 => $request['tin'],
            'tin_image'           => $request['tin_image'],
            'bin'                 => $request['bin'],
            'bin_image'           => $request['bin_image'],
            'created_at'          => Carbon::now(),
        ];

        $businessIdenticalDocumentsId = DB::table('business_identical_documents')->insertGetId($data);
        $businessIdenticalDocument = DB::table('business_identical_documents')->where('id', $businessIdenticalDocumentsId)->first();

        return new BusinessIdenticalDocumentsResource($businessIdenticalDocument);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessIdenticalDocumentsResource
     */
    public function show($id)
    {
        $businessIdenticalDocument = DB::table('business_identical_documents')->where('id', $id)->first();

        return new BusinessIdenticalDocumentsResource($businessIdenticalDocument);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessIdenticalDocumentsResource
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'business_id' => 'required',
        ]);

        DB::table('business_identical_documents')->where('id', $id)->update([
            'business_id'         => $request['business_id'],
            'trade_license_no'    => $request['trade_license_no'],
            'trade_license_image' => $request['trade_license_image'],
            'tin'                 => $request['tin'],
            'tin_image'           => $request['tin_image'],
            'bin'                 => $request['bin'],
            'bin_image'           => $request['bin_image'],
            'updated_at'          => Carbon::now(),
        ]);

        $businessIdenticalDocument = DB::table('business_identical_documents')->where('id', $id)->first();

        return new BusinessIdenticalDocumentsResource($businessIdenticalDocument);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business_identical_documents')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
