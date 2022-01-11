<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/ruang/index', [
            "ruangs" => Ruang::where('status',1)->get() // get data yang statusnya 1/aktif
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Ruang::idOtomatis(); //Pemanggilann method idOtomatis dari model Ruang
        return view('ruang/create', ['id' => $kode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "id" => '',
            "nama" => "required|min:5|unique:ruangs",
            "lantai" =>"required",
            "kapasitas" => "required",
            "foto_ruang" => "image|file|max:10024"
        ]);

        //tambah properti 
        $validated['status'] = 1;
        $validated['creadate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $validated['modidate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

        if($request->file('foto_ruang')) {
            $validated['foto_ruang'] = $request->file('foto_ruang')->store('ruang-images');
        }

        Ruang::create($validated);
        return redirect('/ruang')->with('success', 'Berhasil menambah Ruang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        return view('ruang/edit', [
            "ruang" => $ruang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        $rule = [
            "id" => '',
            "lantai" =>"required",
            "kapasitas" => "required",
            "foto_ruang" => "image|file|max:10024"
        ];

        //jika nama setelah diedit berbeda dengan nama sebelumnya jalankan validasi  
        if($request->nama != $ruang->nama){
            $rule['nama'] = "required|min:5|unique:ruangs";
        }

        //ubah tanggal modidate
        $ruang->modidate = Carbon::now('Asia/Jakarta')->toDateTimeString();

        $validated = $request->validate($rule);

        if($request->file('foto_ruang')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['foto_ruang'] = $request->file('foto_ruang')->store('ruang-images');
        }

        Ruang::where('id', $ruang->id)->update($validated);

        return redirect('/ruang')->with('success', 'Berhasil memperbarui Ruang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        if($ruang->foto_ruang){
            Storage::delete($ruang->foto_ruang);
        }
        $ruang->status = 0; //ubah status jadi 0/tidak aktif
        $ruang->modidate = Carbon::now('Asia/Jakarta')->toDateTimeString(); //ubah tanggal modidate 

        $array = json_decode(json_encode($ruang), true);
        Ruang::where('id', $ruang->id)->update($array);

        return redirect('/ruang')->with('success', 'Berhasil menghapus Ruang');
    }
}
