@extends('layout.template')
@section('databuku')    



        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='/buku' class="btn btn-primary"> <- kembali</a>
                    <a href='{{url('categories/create')}}' class="btn btn-primary"> Tambah Category</a>
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Category</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                      
                        <tr>
                            
                            <td>{{$i}}</td>
                            <td>{{$item->category}}</td>
                           
                            <td>
                                <a href= '{{url('categories/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('categories/'.$item->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach 
                    </tbody>
                 </table>
             {{$data->links()}}  
          </div>
          @endsection 