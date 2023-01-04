<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\karya;
class KaryaController extends Controller
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
        $karya = karya::where('id','like',"%$katakunci%")
        ->orWhere('judul','like',"%$katakunci%")
        ->orWhere('author','like',"%$katakunci%")
        ->orWhere('tag','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $karya = karya::orderBy ('id','desc')->paginate($baris);
        }
        // $karya = karya::orderBy('id', 'desc')->paginate(2);
        return view('karya/index')->with('karya', $karya);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karya.create');
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
        Session::flash('tag', $request->tag);
   
        $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'foto' => 'image|file|max:10000',
            'tag' => 'required'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'author.required' => 'Author wajib diisi',
            'foto.required' => 'Foto wajib diisi',
            'tag.required' => 'Tag wajib diisi',
        ]); 


        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $karya = [
            'judul' => $request->input('judul'),
            'author' => $request->input('author'),
            'tag' => $request->input('tag'),
            'foto' => $foto_nama
        ];
        karya::create($karya);
        return redirect()->to('karya')->with('success', 'Berhasil menambahkan data');
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
        $karya = karya::where('id', $id)->first();
        return view('karya.edit')->with('karya', $karya);
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
            'judul' => 'required',
            // 'author' => 'required',
            'tag' => 'required',
           
           

        ], [
            'judul.required' => 'Judul wajib diisi',
            // 'author.required' => 'Author wajib diisi',
            'tag.required' => 'Tag wajib diisi',
         
         
        ]);
        $karya = [
            'judul' => $request->judul,
            // 'author' => $request->author,
            'tag' => $request->tag,
        ];

        if($request->hasFile=('foto')){
            $request->validate([
                'foto' => 'image|file|max:10000',
            ],[
                'foto.required' => 'Foto wajib diisi',
            ]);
            
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $karya_foto = karya::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $karya_foto->foto);

        $karya =[
                'foto'=>$foto_nama,
                'judul' => $request->judul,
                'tag' => $request->tag,
        ];
        }

        karya::where('id', $id)->update($karya);
        return redirect()->to('karya')->with('success', 'Berhasil mengubah data');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $karya_foto = karya::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $karya_foto->foto);


        karya::where('id', $id)->delete();
        return redirect()->to('karya')->with('success', 'Berhasil menghapus  data');
    }
}
