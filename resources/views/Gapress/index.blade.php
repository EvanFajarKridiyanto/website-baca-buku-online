@extends('layout.logintmp')
@section('databuku')    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
{{-- carousel --}}
<div class="pb-3">
  <form class="d-flex" action="{{'gapress'}}" method="get">
      <input class="form-control me-1" type="search" name="katakunci"  value="{{ Request::get('katakunci') }}"    placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
  </form>
</div>

@include('pesan.pesan')


<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($data as $item)
        <div class="carousel-item active">
            @if ($item->foto)
            <img style='height:500px;width:100%'  src='{{ url('foto').'/'.$item->foto }}' class="d-block w-100" alt="mid"/>
            @endif
            <div class="carousel-caption d-none d-md-block ">
           <h5> <a href="detail/{{ $item['id'] }}">{{ $item->judul }}</h5>
              <p>{{ $item->penulis }}</p> 
            </div>
          </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>

{{-- carousel --}}



{{-- Karya --}}
{{-- <div style="margin-top:5rem;"class="card text-center">
  <div class="card-header">
    Gapress
  </div>
  <div class="card-body">
    <h5 class="card-title">Pamerin Karyamu</h5>
  </div>
  <div class="card-footer text-muted">
    <a href="/karya" class="btn btn-outline-success">Selengkapnya</a>
  
  </div>
</div> --}}
{{-- Karya --}}




  {{-- table --}}


                <table class="table table-striped text-center">
                    <tbody  >
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                  
                        <tr> <td>
                                @if ($item->foto)
                                <img style='max-height:500px;max-width:100%' src='{{ url('foto').'/'.$item->foto }}'/>
                                @endif
                            </td> </tr>
                       
                            <tr><td><h4>{{$item->judul}}</h4></td></tr>
                             <tr><td><h5>by :     {{$item->penulis}}</h5></td></tr>
                            <tr><td><h5> Categoty  :   {{$item->category}}</h5></td></tr>
                            <td>
                              @can('admin') 
                              <a href= '{{url('buku/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                              <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('buku/'.$item->id) }}" method="post">
                                  @csrf 
                                  @method('DELETE')
                                  <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                              </form>
                          @endcan

                                <a href='detail/{{ $item['id'] }}' class="btn btn-primary"> Baca selengkapnya</a>
                                </form>
                            </td>
                        
                             <?php $i++ ?>
                        @endforeach
                    </tbody>
                    <style>
                        td{
                            height:50%;

                        }
                        a {
                          text-decoration:none;
                        }
                        tbody {
                          margin-top:50px;
                        }
                        .table {
                          margin-top:50px;
                        }
                    </style>
                </table>
               {{$data->links()}}
          </div>

         
          @endsection
      