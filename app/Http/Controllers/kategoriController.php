<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{kategori,subkategori};

use Auth,Validator;

class kategoriController extends Controller
{
    /* kategori */

    public function indexKategori()
    {
        $kategori = kategori::orderBy('nama_kategori')->get();
        return view('admin.kategori.kategori_view',compact('kategori'));
    }
    public function simpanKategori(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_kategori' => 'required'
        ]);
        if($validator->fails()) return response()->json(['error'=>$validator->errors()]);
        $kategori = kategori::updateOrCreate(['id'=>$request->id],$request->all());
        $message = $request->id==null ? 'Anda telah berhasil menambahkan kategori' : 'Anda telah berhasil mengubah kategori';
        return response()->json(['success'=>$request->all(),'message'=>$message]);
    }

    public function hapusKategori($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('sukses','anda telah berhasil menghapus kategori');
    }


    /* sub Kategori */

    public function indexSubKategori()
    {
        $kategori = kategori::orderBy('nama_kategori')->get();
        $subkategori = subkategori::with('kategori')->orderBy('nama_subkategori')->get();
        return view('admin.subkategori.subkategori',compact('subkategori','kategori'));
    }
    public function simpanSubKategori(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_subkategori' => 'required'
        ]);
        if($validator->fails()) return response()->json(['error'=>$validator->errors()]);
        $kategori = subkategori::updateOrCreate(['id'=>$request->id],$request->all());
        $message = $request->id==null ? 'Anda telah berhasil menambahkan sub kategori' : 'Anda telah berhasil mengubah sub kategori';
        return response()->json(['success'=>$request->all(),'message'=>$message]);
    }

    public function hapusSubKategori($id)
    {
        $kategori = subkategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('sukses','anda telah berhasil menghapus sub kategori');
    }
}
