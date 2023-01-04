@extends('layout.template')
@section('databuku')

<form action='{{ url('halaman') }}'  method='post' enctype="multipart/form-data">

    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('halaman')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="judulpage" class="col-sm-2 col-form-label">judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judulpage' value="{{Session::get('judulpage')}}" id="judulpage">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <textarea class="form-control summernote " name="isi" value="{{Session::get('isi')}}"  ></textarea>
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
