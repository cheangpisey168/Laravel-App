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
        return [
            "data" => Role::find($id)
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $role = Role::find($id);
    //     if($role){ 
    //         $role->name = $request->name;
    //         $role->description = $request->description;
    //         $role->status = $request->status;
    //         $role->save(); 
    //         return [
    //             "message" => "Role Updated Successfully",
    //             "data" => $role
    //         ];
    //     }else{
    //         return [
    //             "message" => "Role Not Found",
    //             "error" => true
    //         ];
    //     }
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $role = Role::find($id);
        if ($role) {
            $role->update($request->only(['name', 'description', 'status']));
            return response()->json([
                'message' => 'Role Updated Successfully',
                'data' => $role,
            ]);
        } else {
            return response()->json([
                'message' => 'Role Not Found',
                'error' => true,
            ], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
