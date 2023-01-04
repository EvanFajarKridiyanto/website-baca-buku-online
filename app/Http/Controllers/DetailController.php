<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class DetailController extends Controller
{
    public function index($id){
        $data = buku::find($id);
        return view('detail/index',['buku'=>$data]);
    }
}
