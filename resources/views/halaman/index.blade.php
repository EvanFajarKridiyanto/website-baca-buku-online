@extends('layout.logintmp')
@section('databuku')    




   





        <div class="row">
            <div class="col-4">
              <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                <nav class="nav nav-pills flex-column">
                  <a class="nav-link" href="/halaman">Menu Lainnya</a>

                  @can('admin')
                  <a class="nav-link" href='{{ url('halaman/create')  }}'>Tambah Halaman</a>    
                  @endcan
          
                  <?php $i = $data->firstItem()?>
                  @foreach ($data as $item)
                  <nav class="nav nav-pills flex-column">
                    <a  href='read/{{ $item['id'] }}'class="nav-link ms-3 my-1">{{ $item->judulpage }}</a>
                  </nav>
                  <?php $i++ ?>
                  @endforeach 
                </nav>
                {{$data->links()}} 
              </nav>
            </div>
            <div class="col-8">
              
               {{-- <img class="img-fluid"src="https://img.freepik.com/free-vector/tiny-people-examining-operating-system-error-warning-web-page-isolated-flat-illustration_74855-11104.jpg?w=740&t=st=1669213288~exp=1669213888~hmac=0e099912618e9c6a781f17cf6764deab43366a0afec54f062fe5eb370d0645de"> --}}
          </div>



        
        {{-- <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='/buku' class="btn btn-primary"> <- kembali</a>
                    <a href='{{url('halaman/create')}}' class="btn btn-primary"> Tambah Halaman</a>
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">foto</th>
                            <th class="col-md-3">judul</th>
                            <th class="col-md-3">isi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php// $i = $data->firstItem()?>
                        @foreach ($data as $item)
                       
                        <tr>
                            
                            <td>{{$i}}</td>
                            <td>
                                @if ($item->foto)
                                <img style='max-height:50px;max-width:50px' src='{{ url('foto').'/'.$item->foto }}'/>
                                @endif
                            </td>
                            <td>{{$item->judulpage}}</td>
                            <td>{{$item->isi}}</td>
                            <td>
                                <a href= '{{url('halaman/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('halaman/'.$item->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                            </td>
                        </tr>
                              <?php //$i++ ?>
                        @endforeach 
                    </tbody>
                 </table>
             {{$data->links()}}  
          </div> --}}
          @endsection 