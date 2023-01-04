@extends('layout.logintmp')
@section('databuku')

<form action='{{ url('karya') }}'  method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('karya')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{Session::get('judul')}}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <select class="form-select form-select-lg mb-3" name='author' value="{{Session::get('author')}}" id="author" aria-label=".form-select-lg example">
                      <option > {{ auth()->user()->name }}</option>
                </select>
                {{-- <input type="text" class="form-control" name='author' value="{{Session::get('author')}}" id="author"> --}}
            </div>
        </div>
   
        <div class="mb-3 row">
            <label for="tag" class="col-sm-2 col-form-label">Tag</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tag' value="{{Session::get('tag')}}" id="tag">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='foto'id="foto">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>

@endsection
