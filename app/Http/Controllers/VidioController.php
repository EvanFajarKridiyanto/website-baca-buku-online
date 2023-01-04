<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vidio;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 10;
        if(strlen($katakunci)){
        $vidio = vidio::where('id','like',"%$katakunci%")
        ->orWhere('judul','like',"%$katakunci%")
        ->orWhere('author','like',"%$katakunci%")
        ->orWhere('isi','like',"%$katakunci%")
        ->orWhere('tanggal','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $vidio = vidio::orderBy ('id','desc')->paginate($baris);
        }
       
        return view('vidio/index')->with('vidio', $vidio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vidio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('author', $request->author);
        Session::flash('isi', $request->isi);
        Session::flash('tanggal', $request->tanggal);
   
        $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'isi' => 'required',
            'tanggal' => 'required'
            
          
        ], [
            'judul.required' => 'Judul wajib diisi',
            'author.required' => 'Author wajib diisi',
            'isi.required' => 'isi wajib ada',
            'tanggal.required' => 'tanggal  wajib ada',
        ]); 


      

        $vidio = [
            'judul' => $request->input('judul'),
            'author' => $request->input('author'),
            'isi' => $request->input('isi'),
            'tanggal' => $request->input('tanggal'),
        ];
        vidio::create($vidio);
        return redirect()->to('vidio')->with('success', 'Berhasil menambahkan data');
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

    // function komentar(Request $request){
    //     $komentar =komentar::create($request->all());
    //     return redirect()->back()->with('success','komen berhasil');


    //     $komentar =new komentar;
    //     $komentar->user_id= Auth::user()->id;
    //    $komentar->vidio_id=$request->vidio_id;
       
    //     $komentar->save();
    //     return redirect('/vidio');
    //}

    // public function komentarshow(){

    //     $userId= Auth::user()->id;
    //     $buku = cart::where('user_id', $userId)->get();
    //     return view('vidio.index')->with('buku', $buku);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        vidio::where('id', $id)->delete();
        return redirect()->to('vidio')->with('success', 'Berhasil menghapus  data');
    }
}
