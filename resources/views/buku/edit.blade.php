@extends('layout.template')
@section('databuku')   
<!-- START FORM -->
<form action='{{ url('buku/'.$data->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('buku')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$data->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{$data->judul}}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' value="{{$data->penulis}}" id="penulis">
            </div>
        </div>
        
   
        <div class="mb-3 row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='category' value="{{$data->category}}" id="category">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='isi' value="{{$data->isi}}" id="isi">
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <div class="form-group purple-border">
                <textarea  value="{{$data->isi}}"  type="text" class="form-control" name='isi'id="isi" rows="3"></textarea>
              </div> --}}
    
              
        @if ($data->foto)
        <img style='max-height:100px;max-width:100px' src='{{ url('foto').'/'.$data->foto }}'/>
        @endif
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
    <!-- AKHIR FORM -->
    @endsection