<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec leurs rôles
        $users = User::with('roles')->get();

        // Récupérer tous les rôles disponibles
        $allRoles = Role::all();

        // Passer les utilisateurs et les rôles récupérés à la vue
        return view('admin.users', compact('users', 'allRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Update the user's role based on the request data
        $user->syncRoles([$request->role]);

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'User role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);

        if ($user->trashed()) {
            $user->restore();
            return redirect()->back()->with('success', 'User restored successfully');
        } else {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }
    }


    public function trashed()
    {
        $trashedUsers = User::onlyTrashed()->get();
        return view('admin.restoredUsers', compact('trashedUsers'));
    }

    public function restore($userId)
    {
        $user = User::onlyTrashed()->findOrFail($userId);
        $user->restore();

        return redirect('usersList');
    }
}
