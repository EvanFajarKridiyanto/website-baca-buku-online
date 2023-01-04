<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = categories::orderBy('id', 'desc')->paginate(3);
        return view('categories/index')->with('data', $data);
       
    }
// public function buku (){
//     $data = categories::orderBy('id', 'desc');
//     return view('buku/create')->with('data', $data);
// }


// public function buku(){

//     $data = buku::where('id', $id)->get();
//     return view('buku.create')->with('data', $data);
// }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('category', $request->category);
   
        $request->validate([
            'category' => 'required',
           
        ], [
            'category.required' => 'category wajib diisi',
        ]); 



        $data = [
            'category' => $request->input('category'),
        ];

    
        categories::create($data);
        return redirect()->to('categories ')->with('success', 'Berhasil menambahkan data');
    
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
        $data = categories::where('id', $id)->first();
        return view('categories.edit')->with('data', $data);
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
            'category' => 'required',
           
           

        ], [
            'category.required' => 'Category wajib diisi',
         
        ]);
        $data = [
            'category' => $request->category,

        ];
        categories::where('id', $id)->update($data);
        return redirect()->to('categories')->with('success', 'Berhasil mengubah data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categories::where('id', $id)->delete();
        return redirect()->to('categories')->with('success', 'Berhasil menghapus  data');
    }
}
