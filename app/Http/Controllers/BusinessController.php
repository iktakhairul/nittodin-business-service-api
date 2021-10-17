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
            'user_id'              => 'required',
            'business_category_id' => 'required',
            'name'                 => 'required',
            'business_code'        => 'required'
        ]);

        $data = [
            'user_id'              => $request['user_id'],
            'business_category_id' => $request['business_category_id'],
            'name'                 => $request['name'],
            'slug'                 => $request['slug'],
            'type'                 => $request['type'],
            'business_logo'        => $request['business_logo'],
            'business_code'        => $request['business_code'],
            'contact_no'           => $request['contact_no'],
            'email'                => $request['email'],
            'website'              => $request['website'],
            'division_id'          => $request['division_id'],
            'district_id'          => $request['district_id'],
            'thana_id'             => $request['thana_id'],
            'address'              => $request['address'],
            'ranking_score'        => $request['ranking_score'],
            'status'               => $request['status'],
            'created_at'           => Carbon::now(),
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
            'user_id'              => 'required',
            'business_category_id' => 'required',
            'name'                 => 'required',
            'business_code'        => 'required'
        ]);

        DB::table('business')->where('id', $id)->update([
            'user_id'              => $request['user_id'],
            'business_category_id' => $request['business_category_id'],
            'name'                 => $request['name'],
            'slug'                 => $request['slug'],
            'type'                 => $request['type'],
            'business_logo'        => $request['business_logo'],
            'business_code'        => $request['business_code'],
            'contact_no'           => $request['contact_no'],
            'email'                => $request['email'],
            'website'              => $request['website'],
            'division_id'          => $request['division_id'],
            'district_id'          => $request['district_id'],
            'thana_id'             => $request['thana_id'],
            'address'              => $request['address'],
            'ranking_score'        => $request['ranking_score'],
            'status'               => $request['status'],
            'updated_at'           => Carbon::now(),
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
