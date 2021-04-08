<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{anggota,kategori};

use Illuminate\Validation\Rule;

use App\Mail\approveanggota;

use DB,Auth,DataTables,Mail,Validator,Hash,Session;

class anggotaController extends Controller
{
    public function indexAnggota() 
    {
        $kategori = kategori::orderBy('nama_kategori','asc')->get();
        $anggota = anggota::orderBy('id','desc')->paginate(12);
        return view('admin.anggota.anggota_view',compact('anggota','kategori'));
    }

    public function indexApprovalAnggota()
    {
        $anggota = anggota::where('status',0)->orderBy('id','desc')->get();
        return view('admin.anggota.anggota_approval',compact('anggota'));
    }

    protected function kodeOtomatis()
    {
        $kode = 'no_anggota';
        $date = substr(date("Y"),2);
        $anggota=DB::table('anggota')->select(DB::raw('MAX(mid('.$kode.',4,5)) as kd_max'))
                                    ->whereYear('created_at',"20".$date);
        if($anggota->count()>0)
        {
            foreach($anggota->get() as $loopanggota)
            {
                $tmp = ((int)$loopanggota->kd_max) + 1;
                $kode = "UKM-".sprintf("%05s",$tmp)."-".$date;
            }
        }
        else $kode = "UKM-00001-".$date;
        return $kode;
    }

    public function ApproveAnggota($id)
    {
        $anggota = anggota::findOrFail($id);
        $anggota->status = 1;
        $anggota->no_anggota = $this->kodeOtomatis();
        $anggota->save();
        Mail::to($anggota->email)->send(new approveanggota($anggota));
        return redirect()->back()->with('sukses','anda telah berhasil mengapprove keanggotaan');
    }

    public function detailAnggota(Request $request)
    {
        $anggota = anggota::with(['kategori','kecamatan'=>function($query){
            return $query->with('kota');
        }])->where('id',$request->id)->first();
        return response()->json($anggota);
    }

    public function updateAnggotaAdmin(Request $request)
    {
        $anggota = anggota::findOrFail($request->id);
        $validator = Validator::make($request->all(),[
             'email'=>['required','email','max:191',Rule::unique('anggota')->ignore($anggota->email,'email')],
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        } 
        anggota::updateOrCreate(['id'=>$request->id],$request->all());
        return response()->json(['success'=>$request->all()]);
    }

    public function updateFotoAnggotaAdmin(Request $request)
    {
        $anggota = anggota::findOrFail($request->id);
        if($request->foto_anggota != '') {
            $files=$request->file('foto_anggota');
            $nama_files='anggota-'.date('Y').'-'.substr(md5(rand()),0,6).$files->getClientOriginalName();
            $anggota->foto_anggota=$nama_files;
            $files->move('images/anggota/',$nama_files);
            $anggota->save();
        }
        return response()->json(['message'=>'anda telah berhasil mengupdate foto anggota']);
    }

    public function changePasswordAdmin(Request $request)
    {
        $anggota = anggota::findOrFail($request->id);
        $anggota->password = Hash::make($request->password);
        return response()->json(['message'=>'anda telah berhasil mengubah password anggota']);
    }

    public function indexProfile()
    {
        $kategori = kategori::orderBy('nama_kategori','asc')->get();
        $anggota = anggota::findOrFail(Session::get('anggota')->id);
        return view('anggota.profile.profile_view',compact('anggota','kategori'));
    }

    public function simpanProfile(Request $request)
    {
        $anggota = anggota::updateOrCreate(['id'=>Session::get('anggota')->id],$request->all());
        Session::forget('anggota');
        Session::put('anggota',$anggota);
        return redirect()->back()->with('sukses','anda telah berhasil mengubah profil anda');
    }

    public function indexChangePassword()
    {
        return view('anggota.profile.password');
    }
    
    public function simpanProfilePassword(Request $request)
    {
        $this->validate($request,[
            'oldpassword'=>'required',
            'password'=>'required|confirmed|min:5'
             ],['required'=>'Form ini harus diisi','confirmed'=>'konfirmasi password harus sama dengan password baru']);
        $password=Session::get('anggota')->password;
           if (Hash::check($request->oldpassword,$hashedPassword)) {
            $anggota=anggota::find(Session::get('anggota')->id);
            $anggota->password=Hash::make($request->oldpassword);
            $anggota->save();
            $request->session()->forget('anggota');
            return redirect('anggota/login')->with('successMSG','Password Telah diubah');
        }
        return redirect()->back()->with('errorMSG','Password tidak sama dengan password lama');
    }

}
