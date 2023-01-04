@extends('layout.logintmp')
@section('databuku')

<form action='{{ url('vidio') }}'  method='post' enctype="multipart/form-data">

    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('vidio')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">judul</label>
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
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <select class="form-select form-select-lg mb-3" name='tanggal' value="{{Session::get('tanggal')}}" id="tanggal" aria-label=".form-select-lg example">
                      <option > {{ date('l-d-m-Y') }}</option>
                </select>
                {{-- <input type="text" class="form-control" name='author' value="{{Session::get('author')}}" id="author"> --}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <textarea class="form-control summernote " name="isi" value="{{Session::get('isi')}}"  id="isi"></textarea>
        </div>

       
        
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
   
</form>

@endsection
