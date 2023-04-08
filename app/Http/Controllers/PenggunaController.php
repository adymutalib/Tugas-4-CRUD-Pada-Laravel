<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = DB::table('users')->paginate(7);
        return view('pages.index', $data);
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required:min:5|confirmed'
        ]);
        // if ($request->hasfile('image')) {
        //     $image = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
        //     $request->file('image')->move(public_path('img'), $image);
        // }

        // dd($image);
        $query = DB::table('users')->insert([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($query) {
            return redirect()->route('home.index');
            // return view('/pages');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = DB::table('users')->where('id', $id)->first();
        return view('pages.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($query) {
            return redirect()->route('home.index')->with('success', 'Data Berhasil di Update');
        } else {
            return redirect()->route('home.index')->with('failed', 'Data gagal di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('users')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('home.index')->with('success', 'Data Berhasil dihapus');
        } else {
            return redirect()->route('home.index')->with('failed', 'Data Berhasil dihapus');
        }
    }
}
