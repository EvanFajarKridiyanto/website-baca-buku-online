@extends('layout.gapress')
@section('databuku')  


<a href="/gapress"><button class="btn btn-outline-primary bi bi-backspace">  back</button></a>
<div class="card text-center shadow-lg p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h2 class="card-title">{{$buku->judul}}</h2>
    </div>
    <div class="card-body  ">
    

      @if ($buku->foto)
      <img style= 'max-height:100%;max-width:100%;' src='{{ url('foto').'/'.$buku->foto }}'/>
      @endif

      <h5>Categoty :  {{$buku->category}}
       |  By :   {{$buku->penulis}}</h5>
      <p class="card-text">{{$buku->isi}}</p>
     <form action="{{ route('addtocart') }}" method="POST">
      @csrf
      <input type="hidden" name="buku_id"  value="{{$buku->id}}">
           <button class="btn btn-primary">+ Baca Nanti</button>
     
     <form>
    </div>
    <div class="card-footer text-muted">
      
      
        {{-- <a href="{{ '/gapress' }}" class="btn btn-primary">Kembali</a> --}}
    </div>
  </div>
  

          @endsection
      