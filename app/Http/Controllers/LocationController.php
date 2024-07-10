<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    /**
     * Return the locations data from the JSON file.
     */
    public function getLocations(): JsonResponse
    {
        $json = File::get(public_path('db.json'));
        $data = json_decode($json, true);

        return response()->json($data['locations']);
    }
    /**
     * Return the locations data from the JSON file by id.
     */
    public function show($id): JsonResponse
    {
        $json = File::get(public_path('db.json'));
        $data = json_decode($json, true);

        // Find the housing location by ID
        $location = collect($data['locations'])->firstWhere('id', $id);

        if ($location) {
            return response()->json($location);
        } else {
            return response()->json(['message' => 'Housing location not found'], 404);
        }
    }
}
