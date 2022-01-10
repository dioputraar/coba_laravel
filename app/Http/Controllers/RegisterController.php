<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(){
        return view("register/index");
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['email_verified_at'] = Carbon::now('Asia/Jakarta')->toDateTimeString();;
        $validated['jabatan_id'] = mt_rand(1,5);
        $validated['creadate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $validated['modidate'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

        User::create($validated);

        $request->session()->flash('success', 'Registrasi Berhasil, Silahkan login');

        return redirect('/');
    }
}
