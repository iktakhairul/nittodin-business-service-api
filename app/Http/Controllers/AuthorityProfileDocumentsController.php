<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorityProfileDocumentsResource;
use App\Http\Resources\AuthorityProfileDocumentsResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AuthorityProfileDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AuthorityProfileDocumentsResourceCollection
     */
    public function index(Request $request)
    {
        $authorityProfileDocumentss = DB::table('authority_profile_documents')->get();

        return new AuthorityProfileDocumentsResourceCollection($authorityProfileDocumentss);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return AuthorityProfileDocumentsResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'authority_profile_id' => 'required',
        ]);

        $data = [
            'authority_profile_id' => $request['authority_profile_id'],
            'nid'                  => $request['nid'],
            'nid_front_image'      => $request['nid_front_image'],
            'nid_back_image'       => $request['nid_back_image'],
            'tin'                  => $request['tin'],
            'tin_image'            => $request['tin_image'],
            'passport_no'          => $request['passport_no'],
            'created_at'            => Carbon::now(),
        ];

        $authorityProfileDocumentsId = DB::table('authority_profile_documents')->insertGetId($data);
        $authorityProfileDocuments = DB::table('authority_profile_documents')->where('id', $authorityProfileDocumentsId)->first();

        return new AuthorityProfileDocumentsResource($authorityProfileDocuments);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return AuthorityProfileDocumentsResource
     */
    public function show($id)
    {
        $authorityProfileDocuments = DB::table('authority_profile_documents')->where('id', $id)->first();

        return new AuthorityProfileDocumentsResource($authorityProfileDocuments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return AuthorityProfileDocumentsResource
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'authority_profile_id' => 'required',
        ]);

        DB::table('authority_profile_documents')->where('id', $id)->update([
            'authority_profile_id' => $request['authority_profile_id'],
            'nid'                  => $request['nid'],
            'nid_front_image'      => $request['nid_front_image'],
            'nid_back_image'       => $request['nid_back_image'],
            'tin'                  => $request['tin'],
            'tin_image'            => $request['tin_image'],
            'passport_no'          => $request['passport_no'],
            'updated_at'           => Carbon::now(),
        ]);

        $authorityProfileDocuments = DB::table('authority_profile_documents')->where('id', $id)->first();

        return new AuthorityProfileDocumentsResource($authorityProfileDocuments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('authority_profile_documents')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
