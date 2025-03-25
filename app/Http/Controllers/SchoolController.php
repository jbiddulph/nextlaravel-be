<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(16);

        return response()->json([
            'status' => true,
            'schools' => $schools,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $data = $request->validate([
            'establishment_name' => 'required|string',
            // 'banner_image' => ['nullable', 'url'],
        ]);
        $data["id"] = isset($request->id) ? $request->id : $school->id;
        $data["street"] = isset($request->street) ? $request->street : $school->street;
        $data["locality"] = isset($request->locality) ? $request->locality : $school->locality;
        $data["address3"] = isset($request->address3) ? $request->address3 : $school->address3;
        $data["town"] = isset($request->town) ? $request->town : $school->town;
        $data["establishment_type_group"] = isset($request->establishment_type_group) ? $request->establishment_type_group : $school->establishment_type_group;

        // if ($request->hasFile('banner_image')) {
        //     if($product->banner_image) {
        //         Storage::disk('public')->delete($product->banner_image);
        //     }
        //     $data["banner_image"] = $request->file("banner_image")->store("products", "public");
        // }

        $school->update($data);

        return response()->json([
            'status' => true,
            'message' => 'School updated successfully',
        ]);        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
