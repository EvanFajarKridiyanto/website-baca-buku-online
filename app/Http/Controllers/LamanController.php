<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LamanController extends Controller
{
    function index(){
        return view("laman/index");
    }
}
