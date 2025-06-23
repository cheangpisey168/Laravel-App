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
        return [
            "total" =>  Role::count(),
            "list" => Role::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        $role = Role::create($request->only(['name', 'description', 'status']));

        return response()->json([
            'status' => 'success',
            'code' => '00',
            'message' => 'Role created successfully.',
            'data' => $role,
        ], 201); 
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            "data" => Role::find($id)
        ];
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'status' => 'error',
                'code' => '01',
                'message' => 'Role not found.',
            ], 404);
        }

        $role->update($request->only(['name', 'description', 'status']));

        return response()->json([
            'status' => 'success',
            'code' => '00',
            'message' => 'Role updated successfully.',
            'data' => $role,
        ], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'status' => 'error',
                'code' => '01',
                'message' => 'Role not found.',
            ], 404);
        }

        $role->delete();

        return response()->json([
            'status' => 'success',
            'code' => '00',
            'message' => 'Role deleted successfully.',
        ], 200);
    }

}
