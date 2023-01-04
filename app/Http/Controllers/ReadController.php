<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman;

class ReadController extends Controller
{
    public function index($id){
        $data = halaman::find($id);
        return view('read/index',['halaman'=>$data])->with('data',$data);
    }
}
