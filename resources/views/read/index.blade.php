@extends('layout.gapress')
@section('databuku')  





  <div class="row">
    <div class="col-4">
      <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
        <nav class="nav nav-pills flex-column">
            <a class="nav-link" href="/halaman">Menu Lainnya</a>

            @can('admin')
            <a class="nav-link" href='{{ url('halaman/create')  }}'>Tambah Halaman</a>    
            @endcan
    
          <nav class="nav nav-pills flex-column">
            <a class="nav-link ms-3 my-1" href="#item-1-1">{{ $data->judulpage }}</a>
          </nav>
        </nav>
      </nav>
    </div>
  
    <div class="col-8">
      <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
        <div id="item-1">
          <h1>{{ $data->judulpage }}</h1>
            @if ($data->foto)
            <img style= 'max-height:100%;max-width:50%;' src='{{ url('foto').'/'.$data->foto }}'/>
            @endif
         
          <p>{!! $data->isi !!}</p>
        </div>
        @can('admin')
        <a href= '{{url('halaman/'.$data->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
        <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('halaman/'.$data->id) }}" method="post">
        @csrf 
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
    
            @endcan
      
        <a href="{{ '/halaman' }}" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>

          @endsection
      
















