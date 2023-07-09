<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // for users (creators, editors, and users)
    public function index()
    {
        $user = Auth::user();
        $user_roles = $user->roles->pluck('name');

        // user permissions
        $user_permissions = $user->roles->flatMap(function ($role) {
            return $role->permissions->pluck('name');
        })->toArray();

        // user permission count
        $user_permissions_count = $user->roles->flatMap(function ($role) {
            return $role->permissions;
        })->unique('id')->count();

        $data = [
            'user_roles' => $user_roles,
            'user_permissions' => $user_permissions,
            'user_permissions_count' => $user_permissions_count,
        ];

        return view('home', $data);
    }

    // for admininistrator users
    public function dashboard()
    {
        $user = Auth::user();
        $user_roles = $user->roles->pluck('name');

        // user permissions
        $user_permissions = $user->roles->flatMap(function ($role) {
            return $role->permissions->pluck('name');
        })->toArray();

        // user permission count
        $user_permissions_count = $user->roles->flatMap(function ($role) {
            return $role->permissions;
        })->unique('id')->count();

        $data = [
            'user_roles' => $user_roles,
            'user_permissions' => $user_permissions,
            'user_permissions_count' => $user_permissions_count,
        ];

        return view('dashboard', $data);
    }
}
