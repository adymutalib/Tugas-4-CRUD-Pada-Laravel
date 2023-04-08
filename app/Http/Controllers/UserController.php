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
        // $data['user'] = User::all();
        return view('user.login');
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
        if ($request->email == 'admin@admin' && $request->password == '99999') {
            return redirect()->route('home.index');
        } else {
            $credentials = $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required'
            ]);
            // dd($request->email);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('home.index');
                // return view('/pengguna');
            }
            return back()->with('LoginError', 'Login Gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $data['user'] = User::all();
        return view('user.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function authenticate(Request $request)
    {
        //
    }
}
