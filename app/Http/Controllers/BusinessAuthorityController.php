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
        $businessAuthorities = DB::table('businessAuthority')->get();

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

        $businessAuthorityId = DB::table('businessAuthority')->insertGetId($data);
        $businessAuthority = DB::table('businessAuthority')->where('id', $businessAuthorityId)->first();

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
        $businessAuthority = DB::table('businessAuthority')->where('id', $id)->first();

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

        $businessAuthority = DB::table('businessAuthority')->where('id', $id)->first();

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
        DB::table('businessAuthority')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
