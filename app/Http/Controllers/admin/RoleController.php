<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->whereNot('name' , 'user')->whereNot('name' , 'admin')->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name,
            ]);

            foreach ($request->permissions as $permission) {
                $role->givePermissionTo($permission);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex->getMessage());
            return redirect()->back()->with('message' , 'نقش مور نظر ثبت نشد.');
        }
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if($role->name == 'user' || $role->name == 'admin')
            return back()->with('message' , 'شما نمی توانید این کار را انجام دهید.');

        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        if($role->name == 'user' || $role->name == 'admin')
            return back()->with('message' , 'شما نمی توانید این کار را انجام دهید.');

        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
            ]);
            $role->syncPermissions($request->permissions);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back();
        }
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if($role->name == 'user' || $role->name == 'admin')
            return back()->with('message' , 'شما نمی توانید این کار را انجام دهید.');

        $role->delete();
        return back();
    }
}
