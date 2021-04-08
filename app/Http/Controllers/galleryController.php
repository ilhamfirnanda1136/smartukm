<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{anggota,galery,detailgalery};

use Session,DB,DataTables,Validator;

class galleryController extends Controller
{
    public function index()
    {
        return view('anggota.galery.galery_view');
    }

    public function simpanGalery(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_galery' => 'required',
            'keterangan' => 'required'
        ]);
        if($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
        $galery = galery::create(array_merge($request->all(),['anggota_id'=>Session::get('anggota')->id]));
        for ($i=0; $i < count($request->galery) ; $i++) { 
            $detailgalery = new detailgalery();
            $files=$request->file('galery')[$i];
            $nama_files='galery-'.date('Y').'-'.substr(md5(rand()),0,6).$files->getClientOriginalName();
            $detailgalery->galery=$nama_files;
            $detailgalery->galery_id = $galery->id;
            $files->move('images/galery/',$nama_files);
            $detailgalery->save();
        }
        return response()->json(['success'=>$request->all()]);
    }

    public function tableGalery()
    {
        $model = galery::query()->where('anggota_id',Session::get('anggota')->id);
        return DataTables::of($model)
         ->addColumn('action',function($model){
            return view('anggota.galery.action',[
                'model'=>$model,
            ]);
        })
        ->addColumn('galery_view',function($model){
            return "<a href='".url('anggota/detail/galery/'.$model->id)."' class='btn btn-success' > <i class='fa fa-eye'></i> Galery</a>";
        })
        ->addIndexColumn()
        ->rawColumns(['action','galery_view'])
        ->make(true);
    }

    public function detailGalery($id)
    {
        $galery = galery::findOrFail($id);
        return view('anggota.galery.detail_view',compact('galery'));
    }

    public function deleteGalery($id)
    {
        $galery = galery::findOrFail($id);
        detailgalery::where('galery_id',$id)->delete();
        $galery->delete();
        return response()->json(['message'=>'anda telah berhasil menghapus galery'], 200);
    }


}
