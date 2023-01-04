<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\buku;

use App\Models\cart;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        // $this->authorize('admin');
        // if(!auth()->check() || auth()->user()->name !=='admin'){
        //     abort(403);
          
        //    }

        $katakunci = $Request->katakunci;
        $baris = 1;
        if(strlen($katakunci)){
        $data = buku::where('id','like',"%$katakunci%")
        ->orWhere('judul','like',"%$katakunci%")
        ->orWhere('penulis','like',"%$katakunci%")
        ->orWhere('category','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $data = buku::orderBy ('id','desc')->paginate($baris);
        }
      
        return view('buku.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // if(!auth()->check() || auth()->user()->name !=='admin'){
        //     abort(403);
          
        //    }

        Session::flash('id', $request->id);
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('category', $request->category);
        Session::flash('isi', $request->isi);

        $request->validate([
            'id' => 'required|numeric|unique:bukus,id',
            'judul' => 'required',
            'penulis' => 'required',
            'category' => 'required',
            'isi' => 'required',
            'foto' => 'image|file|max:10000'
        ], [
            'id.required' => ' Idwajib diisi',
            'id.numeric' => 'Id wajib dalam angka',
            'id.unique' => 'Id sudah ada dalam database',
            'judul.required' => 'Judul wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'category.required' => 'Category wajib diisi',
            'isi.required' => 'isi belum ada',
            'foto.required' => 'Foto wajib diisi',
        ]); 


        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'id' => $request->input('id'),
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'category' => $request->input('category'),
            'isi' => $request->input('isi'),
            'foto' => $foto_nama
        ];
        // $data =[
        //     'id' =>$request->id,
        //     'judul' =>$request->judul,
        //     'penulis' =>$request->penulis,
        //     'category' =>$request->category,
        //     'isi' =>$request->isi,
        //     'foto'=> $foto_nama
        // ];

        
       
        buku::create($data);
        return redirect()->to('buku')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(!auth()->check() || auth()->user()->name !=='admin'){
        //     abort(403);
          
        //    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!auth()->check() || auth()->user()->name !=='admin'){
        //     abort(403);
          
        //    }
        $data = buku::where('id', $id)->first();
        return view('buku.edit')->with('data', $data);
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
            'penulis' => 'required',
            'category' => 'required',
            'isi' => 'required',
           

        ], [
            'judul.required' => 'Judul wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'category.required' => 'Cataegory wajib diisi',
            'isi.required' => 'Isi wajib ada',
         
        ]);
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'category' => $request->category,
            'isi' => $request->isi,
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

        $data_foto = buku::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);

        $data =[
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'category' => $request->category,
            'isi' => $request->isi,
                'foto'=>$foto_nama
        ];
        }
        buku::where('id', $id)->update($data);
        return redirect()->to('buku')->with('success', 'Berhasil mengubah data');
    }


     function cart(Request $request){
        $cart =new cart;
        $cart->user_id= Auth::user()->id;
       $cart->buku_id=$request->buku_id;
       
        $cart->save();
        return redirect('/gapress');
    }

    static function cartItem(){
        $userId= Auth::user()->id;
        return cart::where('user_id', $userId)->count();
    }


 public function cartpage(){

        $userId= Auth::user()->id;
        $buku = cart::where('user_id', $userId)->get();
        return view('baca.cartlist')->with('buku', $buku);
    }

function hapuscart($id) {
  cart::where('id', $id)->delete();;
  return redirect()->to('cartlist');
}
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data_foto = buku::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);


        buku::where('id', $id)->delete();
        return redirect()->to('buku')->with('success', 'Berhasil menghapus  data');
    }
}
