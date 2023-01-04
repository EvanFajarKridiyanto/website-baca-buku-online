<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\categories;

class TampilController extends Controller
{
    public function index()
    {
        $data = categories::orderBy('id', 'desc')->paginate(10);
        return view('buku/create')->with('data', $data);
       
    }
}
