<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter($nama){
        $nama = explode('-',$nama);
        $nama = implode(' ',$nama);
        $provinsis = Provinsi::all();
        $provinsi = Provinsi::where('nama',$nama)->with('kabupaten.posting.comment')->get();
       return view('filter.filter',compact('provinsi','provinsis'));
        
    }
}
