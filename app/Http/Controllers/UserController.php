<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $users = Auth::user()->id;
        return view('user.profile', compact('users',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $users = Auth::user();
        $user = User::find($id);
        $user->update([
             "username" => $request->username,
             "email" => $request->email,
             "password" => bcrypt($request->password),
        ]);

        // $user->username = $request->username;
        // $user->email = $request->email;
        // $user->password = $request->password;

        // dd($user);
        
        if($user->save()){
            return redirect()->route('user.index')->with('message', 'Anda berhasil mengupdate data :>');
        }else{
            return redirect()->route('user.index')->with('message', 'Anda gagal mengupdate data :(');
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
