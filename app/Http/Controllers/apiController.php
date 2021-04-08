<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function apiKecamatan(Request $request)
    {
        $kecamatan = \App\Models\kecamatan::where('kota_id','=',$request->kota)->get();
        return response()->json(['code'=>200,'data'=>$kecamatan], 200);
    }
}
