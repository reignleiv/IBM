<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest();

        if (request('search')) 
        {
            $users->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('username', 'like', '%' . request('search') . '%');
        }
        return view('dashboard.dashboarduser.index', [
            'active' => 'user',
            "title" => "Daftar User",
            // "users" => User::latest()->filter(request(['search']))
            "users" => $users->get()
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/dashboard/user')->with('success', 'User Telah Berhasil Dihapus');
    }
}
