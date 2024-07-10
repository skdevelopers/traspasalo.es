<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data here
        $role = Role::create($request->only(['name']));
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $sub_title = 'Role Details';
        return view('roles.show', compact('role', 'sub_title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validate the request data here
        $role->update($request->only(['name']));
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Delete the role from the database
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
