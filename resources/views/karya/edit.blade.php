@extends('layout.logintmp')
@section('databuku')   
<!-- START FORM -->
<form action='{{ url('karya/'.$karya->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('karya')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$karya->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{$karya->judul}}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                {{$karya->author}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tag" class="col-sm-2 col-form-label">Tag</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tag' value="{{$karya->tag}}" id="tag">
            </div>
        </div>

        @if ($karya->foto)
        <img style='max-height:100px;max-width:100px' src='{{ url('foto').'/'.$karya->foto }}'/>
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