<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorityProfileResource;
use App\Http\Resources\AuthorityProfileResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AuthorityProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AuthorityProfileResourceCollection
     */
    public function index(Request $request)
    {
        $authorityProfiles = DB::table('authority_profile')->get();

        return new AuthorityProfileResourceCollection($authorityProfiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AuthorityProfileResource
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

        $authorityProfileId = DB::table('authority_profile')->insertGetId($data);
        $authorityProfile = DB::table('authority_profile')->where('id', $authorityProfileId)->first();

        return new AuthorityProfileResource($authorityProfile);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return AuthorityProfileResource
     */
    public function show($id)
    {
        $authorityProfile = DB::table('authority_profile')->where('id', $id)->first();

        return new AuthorityProfileResource($authorityProfile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return AuthorityProfileResource
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

        $authorityProfile = DB::table('authority_profile')->where('id', $id)->first();

        return new AuthorityProfileResource($authorityProfile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('authority_profile')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
