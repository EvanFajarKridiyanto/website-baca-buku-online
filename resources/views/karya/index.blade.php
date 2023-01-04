@extends('layout.logintmp')
@section('databuku')



{{-- <div class="pb-3">
    <form class="d-flex" action="{{'karya'}}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div> --}}


  


  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Pamerin Karyamu</h1>
        <p class="lead text-muted"> Hai {{ auth()->user()->name }},simpan semua karyamu disini. Banyak hal yang harus disimpan kecuali dengan kenangannya. </p>
          <a href='{{url('karya/create')}}' class="btn btn-outline-primary my-2">+ Karya</a>
          {{-- <a href='{{url('gapress')}}' class="btn btn-secondary my-2"><- Back</a> --}}
        <!-- Button trigger modal -->


<!-- Modal -->

        
        </p>
      </div>
    </div>
  </section>


<div class="pb-3">
    <form class="d-flex" action="{{'karya'}}" method="get">
        <input class="form-control me-1" type="search" name="katakunci"  value="{{ Request::get('katakunci') }}"  placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>


  <div class="row">
    <?php $i = $karya->firstItem()?>
  @foreach ($karya as $item)
    <div style="margin-top:30px;" class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-header">
          <a href = "/" ><h5 class="card-text"><i class="bi bi-person-circle">  {{ $item->author }}</i> </h5>
          </a>
              @can('admin') 
          <a href= '{{url('karya/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
          
          <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('karya/'.$item->id) }}" method="post">
              @csrf 
              @method('DELETE')
              <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
          </form>
          
      @endcan
       </div>
        @if ($item->foto)
        <img style=height:500px;  src='{{ url('foto').'/'.$item->foto }}' class="d-block" alt="mid"/>
        @endif
      
        <div class="card-body">
          <h5 class="card-title">{{ $item->judul }}</h5>
          <p class="card-text"> {{ $item->tag }}</p>
        </div>
      
    
        </div>
        <?php $i++ ?>
      </div>
      @endforeach
    </div>
    {{-- <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
      <input type= "radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn btn-outline-dark" for="btnradio1"><a  href='karya'>Karya</a></label>
    
      <input  href='{{url('vidio/create')}}'type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn btn-outline-dark" for="btnradio2"><a  href='vidio'>Cerita</a></label>
    
  
    </div> --}}
    {{$karya->links()}}
    </div>
  </div>
  







@endsection