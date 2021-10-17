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
            "group_id"      => 'required',
            "name"          => 'required',
            "category_code" => 'required',
        ]);

        $data = [
            "group_id"      => $request['group_id'],
            "name"          => $request['name'],
            "slug"          => $request['slug'],
            "icon"          => $request['icon'],
            "category_code" => $request['category_code'],
            "serial_no"     => $request['serial_no'],
            "short_details" => $request['short_details'],
            "status"        => $request['status'],
            "created_at"    => Carbon::now(),
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
            "group_id"      => 'required',
            "name"          => 'required',
            "category_code" => 'required',
        ]);

        DB::table('categories')->where('id', $id)->update([
            "group_id"      => $request['group_id'],
            "name"          => $request['name'],
            "slug"          => $request['slug'],
            "icon"          => $request['icon'],
            "category_code" => $request['category_code'],
            "serial_no"     => $request['serial_no'],
            "short_details" => $request['short_details'],
            "status"        => $request['status'],
            "updated_at"    => Carbon::now(),
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
