<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessCategoryResource;
use App\Http\Resources\BusinessCategoryResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BusinessCategoryResourceCollection
     */
    public function index(Request $request)
    {
        $business_categories = DB::table('business_categories')->get();

        return new BusinessCategoryResourceCollection($business_categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BusinessCategoryResource
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

        $business_categoryId = DB::table('business_categories')->insertGetId($data);
        $business_category = DB::table('business_categories')->where('id', $business_categoryId)->first();

        return new BusinessCategoryResource($business_category);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BusinessCategoryResource
     */
    public function show($id)
    {
        $business_category = DB::table('business_categories')->where('id', $id)->first();

        return new BusinessCategoryResource($business_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return BusinessCategoryResource
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

        $business_category = DB::table('business_categories')->where('id', $id)->first();

        return new BusinessCategoryResource($business_category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|string
     */
    public function destroy($id)
    {
        DB::table('business_categories')->where('id', $id)->delete();

        return response()->json(null, 204);
    }
}
