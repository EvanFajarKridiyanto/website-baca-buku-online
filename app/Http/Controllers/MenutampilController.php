<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\halaman;

class MenutampilController extends Controller
{
    public function index()
    {
        $data = halaman::orderBy('id', 'desc')->paginate(10);
        return view('menu.index')->with('data', $data);
       
    }
}
