<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/jabatan/index', [
            "jabatans" => Jabatan::where('status',1)->get() // get data yang statusnya 1/aktif
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan/create');
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
            "jabatan" => "required|unique:jabatans",
        ]);

        $validated['status'] = 1;
        $validated['creadate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $validated['modidate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

        Jabatan::create($validated);
        return redirect('/jabatan')->with('success', 'Berhasil menambah Jabatan');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan/edit', [
            "jabatan" => $jabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $rule = [
            "jabatan" =>"required",
        ];

        //jika jabatan setelah diedit berbeda dengan jabatan sebelumnya jalankan validasi  
        if($request->jabatan != $jabatan->jabatan){
            $rule['jabatan'] = "required|unique:jabatans";
        }

        //ubah tanggal modidate
        $jabatan->modidate = Carbon::now('Asia/Jakarta')->toDateTimeString();

        $validated = $request->validate($rule);
        Jabatan::where('id', $jabatan->id)->update($validated);

        return redirect('/jabatan')->with('success', 'Berhasil memperbarui Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->status = 0; //ubah status jadi 0/tidak aktif
        $jabatan->modidate = Carbon::now('Asia/Jakarta')->toDateTimeString(); //ubah tanggal modidate 

        $array = json_decode(json_encode($jabatan), true);
        Jabatan::where('id', $jabatan->id)->update($array);

        return redirect('/jabatan')->with('success', 'Berhasil menghapus Jabatan');
    }
}
