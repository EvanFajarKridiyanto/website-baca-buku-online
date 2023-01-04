<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\buku;
class ContacController extends Controller
{
    function index(){
        $data = buku::orderBy('id', 'desc')->paginate(6);
        return view('rekomendasi/index')->with('data', $data);
        
    }

    function about(){
        $data = buku::orderBy('id', 'desc');
        return view("contac/about")->with('data', $data);
    }
}
