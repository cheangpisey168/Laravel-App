<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 22;
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // Create and save new Role
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->status = $request->status;
        $role->save();

        // Return response
        return response()->json([
            'message' => 'Role Created Successfully',
            'data' => $role
        ], 201); // 201 = Created
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
