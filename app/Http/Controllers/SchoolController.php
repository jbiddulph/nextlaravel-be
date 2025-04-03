<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Str; // Import Str for UUID validation
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
     * Display a listing of the resource based on the search query.
     */
    public function search(Request $request)
    {
        // Map 'query' to 'search' for consistency
        $filters = $request->only(['query', 'establishment_type_group', 'phase_of_education']);
        if (isset($filters['query'])) {
            $filters['search'] = $filters['query'];
            unset($filters['query']); // Remove 'query' to avoid confusion
        }

        // Apply the filters using the scopeFilter method
        $schools = School::filter($filters)->paginate(16);

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
            'featured_image' => ['nullable', 'url'],
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
     * Handle the request and return the photo based on the provided id.
     */
    public function getPhoto(Request $request)
    {
        $school_id = $request->query('id'); // ✅ Get ID from query string
        Log::info('Received school_id:', ['id' => $school_id]);

        if (!$school_id) {
            return response()->json(['message' => 'Missing school_id.'], 400);
        }

        $school = School::where('id', $school_id)->first(); // ✅ Ensure correct column

        if (!$school || !$school->featured_image) {
            return response()->json(['message' => 'School or photo not found.'], 404);
        }

        return response()->json(['photo_url' => $school->featured_image]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
