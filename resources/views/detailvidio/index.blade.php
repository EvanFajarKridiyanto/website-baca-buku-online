@extends('layout.logintmp')
@section('databuku')


<a href="/vidio"><button class="btn btn-outline-primary bi bi-backspace">  back</button></a>

  <div class="row ">
    <div style="margin-top:30px;" class="col-sm-12">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-header"> 
          <a href = "/" ><h5 class="card-text"><i class="bi bi-person-circle">  {{ $vidio->author }}</i> </h5>
          </a>            
       </div>
      
        <div class="card-body text-center ">
          <h5 class="card-title">{{ $vidio->judul }}</h5>
          <div style="width:100%; overflow:hidden;">
            <p class="card-text"> {!! $vidio->isi!!}</p>
       
        
            {{-- <a href='detailvidio/{{ $item['id'] }}' class="btn btn-primary"> Baca selengkapnya</a> --}}
          </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+ Komentar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">  {{ $vidio->judul }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          @csrf
          <input type="hidden" name="vidio_id" value="{{ $vidio->id }}">
          <input type="hidden" name="parent" value="0">
     <div class="btn-group">
      <h5 style="margin-top:50px; ">Tambah Komentar</h5>

     </div>
      <textarea  name="comment" class="form-control" id="comment" rows='4' placeholder="+ komentar">
      </textarea>
      <input type="submit" class="btn btn-outline-primary" value="kirim">
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>



          {{-- <form action="" method="POST">
            @csrf
            <input type="hidden" name="vidio_id" value="{{ $vidio->id }}">
            <input type="hidden" name="parent" value="0">
       <div class="btn-group">
        <h5 style="margin-top:50px; ">Tambah Komentar</h5>

       </div>
        <textarea  name="comment" class="form-control" id="comment" rows='4' placeholder="+ komentar">
        </textarea>
        <input type="submit" class="btn btn-outline-primary" value="kirim">
      </form> --}}



      <h5 style="margin-top:50px; " >komentar from {{ $vidio->judul }} </h5>
      @foreach ( $vidio->komentar()->orderBy('created_at','desc')->get() as $komentar)
      <div style="margin-bottom:20px;" class="card">
        <div class="card-body">
          <div class="d-flex flex-start">      
            <h6 class="fw-bold text-primary">{{ $komentar->user->name }} say '{{ $komentar->comment}}'</h6>  <br> 
      
            </div>
          </div>
          <div class="card-footer">
            <p class= "text-start">{{ $komentar->created_at->diffForHumans() }}</p>
          </div>
        </div>
        @endforeach
        
   
        <div class="card-footer">

        <a class="text-center">{{ $vidio->tanggal }}</a>
        </div>
        </div>
        
      </div>
     
    </div>
    {{-- <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
      <input type= "radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn btn-outline-dark" for="btnradio1"><a  href='karya'>Karya</a></label>
    
      <input  href='{{url('vidio/create')}}'type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn btn-outline-dark" for="btnradio2"><a  href='vidio'>Cerita</a></label>
    </div> --}}
    
    </div>
  </div>
  

  {{-- <script>
    $(document).ready(function(){
        $('#btn-komen').click(function(){
    alert(0);
        });
    });
</script> --}}





@endsection

