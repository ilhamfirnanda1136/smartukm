<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User,kategori,anggota,kota,kecamatan};

use Auth,Mail,Hash,Session;

use App\Mail\pendaftaran;


class AuthController extends Controller
{
     /* admin */
    public function index()
    {
        return view('auth.login_admin');
    }

    public function process(Request $req)
    {
        $req->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);
        $user = User::where('username',$req->username)->first();
        if(!$user) return redirect()->back()->with('error','mohon maaf username yang anda masukkan salah');
        if(!Auth::attempt(['username' => $req->username, 'password' => $req->password]))
        return redirect()->back()->with('error','mohon maaf password yang anda masukkan salah');
        return redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); 
    }

    /* Anggota */
    public function indexRegisterAnggota()
    {
        $kota = kota::orderBy('nama_kota')->get();
        $kategori = kategori::orderBy('nama_kategori')->get();
        return view('auth.register_anggota',compact('kategori','kota'));
    }

    public function processRegisterAnggota(Request $request)
    {
        anggota::create(array_merge($request->except('password'),['password'=>Hash::make($request->password)]));
        $emailData = [
            'subject'=>'notifikasi Registrasi Pendaftaran Anggota',
        ];
        Mail::to($request->email)->send(new pendaftaran($emailData));
        return redirect()->back()->with('sukses','anda telah berhasil mendaftar sebagai anggota mohon tunggu konfirmasi selanjutnya');
    }

    public function indexLoginAnggota()
    {
        return view('auth.login_anggota');
    }

    public function processLoginAnggota(Request $request)
    {
        $anggota = anggota::where('email',$request->email)->first();
        if($anggota) {
            $hashedPassword = $anggota->password;
            if (Hash::check($request->password,$hashedPassword)) {
                if($anggota->status == 1) {
                    $request->session()->forget('anggota');
                    $request->session()->put('anggota',$anggota);
                    return redirect('/anggota/dashboard');
                } else {
                    return redirect()->back()->with('error','mohon maaf keanggotaan anda belum aktif');
                }
            } else {
                 return redirect()->back()->with('error','mohon maaf Password yang anda masukkan salah');
            }
        } 
        return redirect()->back()->with('error','mohon maaf email yang anda masukkan salah');
    }

    public function anggotaLogout()
    {
        Session::forget('anggota');
        return redirect('anggota/login');
    }
}
