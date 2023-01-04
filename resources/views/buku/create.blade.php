@extends('layout.template')
@section('databuku')   
<!-- START FORM -->
<form action='{{ url('buku') }}'  method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('buku')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id' value="{{Session::get('id')}}" id="id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{Session::get('judul')}}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' value="{{Session::get('penulis')}}" id="penulis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">   
                <select class="form-select form-select-lg mb-3" name='category' value="{{Session::get('category')}}" id="category" aria-label=".form-select-lg example">
                    <?php $i = $data->firstItem()?>
                    @foreach ($data as $item)
                      <option >{{ $item->category }}</option>
                      <?php $i++ ?>
                      @endforeach 
                   
                      {{$data->links()}}  
                    {{-- <option>Petualangan</option>
                    <option>Horor</option>
               --}}
             
   
        {{-- <div class="mb-3 row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='category' value="{{Session::get('category')}}" id="category">
            </div>
        </div>
         --}}
            <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <div class="form-group purple-border">
                <textarea  type="text" class="form-control" name='isi' value="{{Session::get('isi')}}" id="isi" id="isi" rows="3"></textarea>
              </div>
            {{-- <div class="col-sm-10">
                <input style="height:250px;" type="text" class="form-control" name='isi' value="{{Session::get('isi')}}" id="isi">
            </div> --}}
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
    <!-- AKHIR FORM -->
    @endsection