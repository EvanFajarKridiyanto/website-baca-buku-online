<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\vidio;
use App\Models\komentar;
class DetailVidioController extends Controller
{
    public function index($id){
        $vidio = vidio::find($id);
        return view('detailvidio/index',['vidio'=>$vidio]);
    }
    public function postkomentar(Request $request){
        // $userId= Auth::user()->id;
        $request->request->add(['user_id'=>auth()->user()->id]);
        $komentar = komentar::create($request->all());
        return redirect()->back()->with ("success",'komentar berhasi ditambahkan');

        // dd($request->all());
    }
    
}
