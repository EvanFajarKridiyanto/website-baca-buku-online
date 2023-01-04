<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\halaman;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = halaman::orderBy('id', 'desc')->paginate(3);
        return view('halaman.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judulpage', $request->judulpage);
        Session::flash('isi', $request->isi);
   
        $request->validate([
            'judulpage' => 'required',
            'isi' => 'required',
            'foto' => 'image|file|max:10000'
           
        ], [
            'judulpage.required' => 'Judul wajib diisi',
            'isi.required' => 'isi tidak boleh kosong',
            'foto.required' => 'Foto wajib diisi',
        ]); 

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'judulpage' => $request->input('judulpage'),
            'isi' => $request->input('isi'),
            'foto' => $foto_nama
        ];

    
        halaman::create($data);
        return redirect()->to('halaman')->with('success', 'Berhasil menambahkan data');
    
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
        $data = halaman::where('id', $id)->first();
        return view('halaman.edit')->with('data', $data);
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
        $request->validate([
            'judulpage' => 'required',
            'isi' => 'required',
           
           

        ], [
            'judulpage.required' => 'Judul wajib diisi',
            'isi.required' => ' Isi harus ada',
         
        ]);
        $data = [
            'judulpage' => $request->judulpage,
            'isi' => $request->isi,

        ];
        halaman::where('id', $id)->update($data);
        return redirect()->to('halaman')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_foto = halaman::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data_foto->foto);
    
    
            halaman::where('id', $id)->delete();
            return redirect()->to('halaman')->with('success', 'Berhasil menghapus  data');
    }
}
