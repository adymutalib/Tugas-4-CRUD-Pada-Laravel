<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cars'] = DB::table('car_models')->paginate(1);
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CarModel $carModel)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plat' => 'required|max:10',
            'nama_motor' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($request->hasfile('image')) {
            $image = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('img'), $image);
        }

        // dd($image);
        $query = DB::table('car_models')->insert([
            'plat' => $request->plat,
            'nama_motor' => $request->nama_motor,
            'alamat' => $request->alamat,
            'gambar' => $image,
        ]);
        if ($query) {
            return redirect()->route('home.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['car'] = DB::table('car_models')->where('id', $id)->first();
        return view('mahasiswa.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query = DB::table('car_models')->where('id', $id)->update([
            'plat' => $request->plat,
            'nama_motor' => $request->nama_motor,
            'alamat' => $request->alamat
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
        $query = DB::table('car_models')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('home.index')->with('success', 'Data Berhasil dihapus');
        } else {
            return redirect()->route('home.index')->with('failed', 'Data Berhasil dihapus');
        }
    }
}
