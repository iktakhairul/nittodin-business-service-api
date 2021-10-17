<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\BusinessResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessResourceCollection
     */
    public function index(Request $request)
    {
        $business = DB::table('business')->get();

        return new BusinessResourceCollection($business);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessResource
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

        $businessId = DB::table('business')->insertGetId($data);
        $business = DB::table('business')->where('id', $businessId)->first();

        return new BusinessResource($business);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessResource
     */
    public function show($id)
    {
        $business = DB::table('business')->where('id', $id)->first();

        return new BusinessResource($business);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessResource
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

        $business = DB::table('business')->where('id', $id)->first();

        return new BusinessResource($business);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
