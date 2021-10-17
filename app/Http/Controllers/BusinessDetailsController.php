<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessDetailsResource;
use App\Http\Resources\BusinessDetailsResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessDetailsResourceCollection
     */
    public function index(Request $request)
    {
        $businessDetails = DB::table('business_details')->get();

        return new BusinessDetailsResourceCollection($businessDetails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessDetailsResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'business_id' => 'required',
        ]);

        $data = [
            'business_id'  => $request['business_id'],
            'description'  => $request['name'],
            'cover_images' => $request['slug'],
            'created_at'   => Carbon::now(),
        ];

        $businessDetailsId = DB::table('business_details')->insertGetId($data);
        $businessDetails = DB::table('business_details')->where('id', $businessDetailsId)->first();

        return new BusinessDetailsResource($businessDetails);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessDetailsResource
     */
    public function show($id)
    {
        $businessDetails = DB::table('business_details')->where('id', $id)->first();

        return new BusinessDetailsResource($businessDetails);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessDetailsResource
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'business_id' => 'required',
        ]);

        DB::table('business_details')->where('id', $id)->update([
            'business_id'  => $request['business_id'],
            'description'  => $request['name'],
            'cover_images' => $request['slug'],
            'updated_at'    => Carbon::now(),
        ]);

        $businessDetails = DB::table('business_details')->where('id', $id)->first();

        return new BusinessDetailsResource($businessDetails);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business_details')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
