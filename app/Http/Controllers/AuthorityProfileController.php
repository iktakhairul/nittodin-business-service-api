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
            'business_authority_id' => 'required',
        ]);

        $data = [
            'business_authority_id' => $request['business_authority_id'],
            'father_name'           => $request['father_name'],
            'mother_name'           => $request['mother_name'],
            'gender'                => $request['gender'],
            'dob'                   => $request['dob'],
            'religion'              => $request['religion'],
            'nationality'           => $request['nationality'],
            'permanent_division_id' => $request['permanent_division_id'],
            'permanent_district_id' => $request['permanent_district_id'],
            'permanent_thana_id'    => $request['permanent_thana_id'],
            'permanent_address'     => $request['permanent_address'],
            'photo'                 => $request['photo'],
            'created_at'            => Carbon::now(),
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
            'business_authority_id' => 'required',
        ]);

        DB::table('authority_profile')->where('id', $id)->update([
            'business_authority_id' => $request['business_authority_id'],
            'father_name'           => $request['father_name'],
            'mother_name'           => $request['mother_name'],
            'gender'                => $request['gender'],
            'dob'                   => $request['dob'],
            'religion'              => $request['religion'],
            'nationality'           => $request['nationality'],
            'permanent_division_id' => $request['permanent_division_id'],
            'permanent_district_id' => $request['permanent_district_id'],
            'permanent_thana_id'    => $request['permanent_thana_id'],
            'permanent_address'     => $request['permanent_address'],
            'photo'                 => $request['photo'],
            'updated_at'            => Carbon::now(),
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
