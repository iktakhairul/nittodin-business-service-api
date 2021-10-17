<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessAuthorityResource;
use App\Http\Resources\BusinessAuthorityResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessAuthorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessAuthorityResourceCollection
     */
    public function index(Request $request)
    {
        $businessAuthorities = DB::table('business_authorities')->get();

        return new BusinessAuthorityResourceCollection($businessAuthorities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessAuthorityResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'business_id' => 'required',
            'name'        => 'required',
        ]);

        $data = [
            'user_id'              => $request['user_id'],
            'business_id'          => $request['business_id'],
            'name'                 => $request['name'],
            'contact_numbers'      => $request['contact_numbers'],
            'emails'               => $request['emails'],
            'ownership_percentage' => $request['ownership_percentage'],
            'status'               => $request['status'],
            'created_at'           => Carbon::now(),
        ];

        $businessAuthorityId = DB::table('business_authorities')->insertGetId($data);
        $businessAuthority = DB::table('business_authorities')->where('id', $businessAuthorityId)->first();

        return new BusinessAuthorityResource($businessAuthority);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessAuthorityResource
     */
    public function show($id)
    {
        $businessAuthority = DB::table('business_authorities')->where('id', $id)->first();

        return new BusinessAuthorityResource($businessAuthority);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessAuthorityResource
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'business_id' => 'required',
            'name'        => 'required',
        ]);

        DB::table('business_authorities')->where('id', $id)->update([
            'user_id'              => $request['user_id'],
            'business_id'          => $request['business_id'],
            'name'                 => $request['name'],
            'contact_numbers'      => $request['contact_numbers'],
            'emails'               => $request['emails'],
            'ownership_percentage' => $request['ownership_percentage'],
            'status'               => $request['status'],
            'updated_at'           => Carbon::now(),
        ]);

        $businessAuthority = DB::table('business_authorities')->where('id', $id)->first();

        return new BusinessAuthorityResource($businessAuthority);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business_authorities')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
