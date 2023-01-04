          @extends('layout.logintmp')
          @section('databuku')


          <div class="row">
              <h3>Baca Nanti</h3>
              @foreach ($buku as $data)
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                      <div class="card h-100">
                        <div class="card-body">
                          @if ($data->buku->foto)
                          <img style='max-height:100%;max-width:100%' src='{{ url('foto').'/'.$data->buku->foto }}'/>
                          @endif
                          <h5 class="card-title"> {{$data->buku->judul}}</h5>
      
                      </div>
                        <div class="card-footer">
                          
                          {{-- <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('hapuscart/'.$data->id) }}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                        
                        </form>  --}}
                        <a href='detail/{{ $data->buku->id }}' class="btn btn-primary"> Lanjut Baca</a>
                          <a href='/hapuscart/{{ $data->id }}' class="btn btn-danger"><i class="bi bi-trash">Hapus</i></a>   
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                 
                  {{-- {{-- {{$data->links()}} --}}

          @endsection 



            



