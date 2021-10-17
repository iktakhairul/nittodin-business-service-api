<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessPrivateDocumentsResource;
use App\Http\Resources\BusinessPrivateDocumentsResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessPrivateDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessPrivateDocumentsResourceCollection
     */
    public function index(Request $request)
    {
        $businessPrivateDocuments = DB::table('business_private_documents')->get();

        return new BusinessPrivateDocumentsResourceCollection($businessPrivateDocuments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessPrivateDocumentsResource
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

        $businessPrivateDocumentId = DB::table('business_private_documents')->insertGetId($data);
        $businessPrivateDocument = DB::table('business_private_documents')->where('id', $businessPrivateDocumentId)->first();

        return new BusinessPrivateDocumentsResource($businessPrivateDocument);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessPrivateDocumentsResource
     */
    public function show($id)
    {
        $businessPrivateDocument = DB::table('business_private_documents')->where('id', $id)->first();

        return new BusinessPrivateDocumentsResource($businessPrivateDocument);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessPrivateDocumentsResource
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            "group_id"      => 'required',
            "name"          => 'required',
            "category_code" => 'required',
        ]);

        DB::table('business_private_documents')->where('id', $id)->update([
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

        $businessPrivateDocument = DB::table('business_private_documents')->where('id', $id)->first();

        return new BusinessPrivateDocumentsResource($businessPrivateDocument);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business_private_documents')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
