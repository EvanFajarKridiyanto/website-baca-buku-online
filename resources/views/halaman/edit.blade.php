@extends('layout.logintmp')
@section('databuku')   
<!-- START FORM -->
<form action='{{ url('halaman/'.$data->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('halaman')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$data->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judulpage" class="col-sm-2 col-form-label">judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judulpage' value="{{$data->judulpage}}" id="judulpage">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">isi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='isi' value="{{$data->isi}}" id="isi">
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