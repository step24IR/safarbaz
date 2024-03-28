<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create' , compact( 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|iran_mobile|digits:11|unique:users,number',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'number' => $request->number,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('message' , 'در دیتابیس خطایی رخ داد.');
        }

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show' , compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit' , compact('user' ,  'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|iran_mobile|digits:11',
            'password' => 'nullable|confirmed',
            'role' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'number' => $request->number,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);

            $user->syncRoles($request->role);
            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('message' , 'در دیتابیس خطایی رخ داد.');
        }

        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin'))
            return back()->with('message' , 'شما نمی توانید این کار را انجام دهید.');

        $user->delete();
        return back();
    }

    public function loginToAdmin()
    {
        return view('admin.login');
    }
    public function handleLoginToAdmin(Request $request)
    {
        $credentials = $request->validate([
            'number' => 'required|numeric',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials,$request->has('remember_me'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->with(
            'message', 'شماره همراه یا پسورد را اشتباه وارد کردید.',
        )->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
