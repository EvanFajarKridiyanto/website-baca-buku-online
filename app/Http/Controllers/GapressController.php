<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class GapressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 2;
        if(strlen($katakunci)){
        $data = buku::where('id','like',"%$katakunci%")
        ->orWhere('judul','like',"%$katakunci%")
        ->orWhere('penulis','like',"%$katakunci%")
        ->orWhere('category','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $data = buku::orderBy ('id','desc')->paginate($baris);
        }

    // $data = buku::orderBy('id', 'desc')->paginate(2);
    return view('gapress/index')->with('data', $data);
    }

    function detail($id)
    {
        $data = buku::where('id', $id)->first();
        return view('gapress/show')->with('data', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
