@extends('layout.logintmp')
@section('databuku')




  


  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Tulis Ceritamu</h1>
        <p class="lead text-muted"> Happy {{ date('l') }}  {{ auth()->user()->name }},tulis dan bagikan ceritamu disini.Tetaplah hidup meskipun kamu tidak berguna.</p>
          <a href='{{url('vidio/create')}}' class="btn btn-outline-primary my-2">+ Cerita </a> 
      
       </p>
      </div>
    </div>
  </section> 


  <div class="pb-3">
    <form class="d-flex" action="{{'vidio'}}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div>




  <div class="row ">
    <?php $i = $vidio->firstItem()?>
  @foreach ($vidio as $item)
    <div style="margin-top:30px;" class="col-sm-12">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-header">
          <a href = "/" ><h5 class="card-text"><i class="bi bi-person-circle">  {{ $item->author }}</i> </h5>
          </a>
          
              @can('admin') 
          <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('vidio/'.$item->id) }}" method="post">
              @csrf 
              @method('DELETE')
              <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
          </form>
          
      @endcan
       </div>
      
        <div class="card-body text-center ">
          <h5 class="card-title">{{ $item->judul }}</h5>
          <div style="width:100%; overflow:hidden;">
            {{-- <p class="card-text"> {!! $item->isi!!}</p> --}}
            <a href='detailvidio/{{ $item['id'] }}' class="btn btn-primary"> Baca selengkapnya</a>
          </div>
          {{-- <div class="col-md-12 col-lg-12">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
              <div class="card-body p-4">
                <div class="form-outline mb-4">
                  <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                  <label class="form-label" for="addANote">+ Add a note</label>
                </div>
        
                <div class="card mb-4">
                  <div class="card-body">
                    <p>Type your note, and hit enter to add it</p>
        
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <p class="small mb-0 ms-2">Martha</p>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                      
                      </div>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                          <button type="button" class="btn btn-outline-primary">Left</button>
                          <button type="button" class="btn btn-outline-primary">Middle</button>
                          <button type="button" class="btn btn-outline-primary">Right</button>
                        </div>
                    </div>
                  </div>
                </div> --}}
        </div>
        <div class="card-footer">

        <a class="text-center">{{ $item->tanggal }}</a>
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
    {{$vidio->links()}}
    </div>
  </div>
  







@endsection