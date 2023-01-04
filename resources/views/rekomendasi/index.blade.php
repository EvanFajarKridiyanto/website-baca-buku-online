@extends('layout.gapress')
@section('databuku')

<div class="row">
    <h3>Rekemendasi Buku Terbaru</h3>
    @foreach ($data as $item)
    <div class="col-sm-6">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
          @if ($item->foto)
          <img style=height:100%;  src='{{ url('foto').'/'.$item->foto }}' class="d-block w-100" alt="mid"/>
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text">By : {{ $item->penulis }}</p>
            <a href="detail/{{ $item['id'] }}" class="btn btn-outline-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    @endforeach
    <style>
        .card {
            margin-bottom:30px;
        }
    </style>
    
  </div>

@endsection



  



