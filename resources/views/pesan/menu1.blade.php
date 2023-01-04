<?php 
use App\Http\Controllers\BukuController;
$total = BukuController::cartItem();
?>


<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/gapress" class="d-flex align-items-center mb-3 mb-md-0 me-md-center text-dark text-decoration-none">
    <span class="fs-4 text-center ms-center" >  Ga Press</span>
  </a>
 
 
    {{-- <li class="nav-item dropdown">
      <a  class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person">  {{ auth()->user()->name }}</i> 
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/login/logout">Logout</a></li>
      </ul>
    </li> --}}
  
    {{-- <li class="nav-item text-end"><a href="/login/logout" class="nav-link">Logout</a></li> --}}
  

  

   
  
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</header>



    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  
      <ul class="nav nav-pills">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Terbitkan Karyamu</button>
            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
              <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvasBottomLabel">Haloo {{ auth()->user()->name }}  posting karya terbaikmu disini.Lihat karya,baca cerita dari pengguna lain secara gratis.</h6>
               
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body small">
                 <li class="nav-item"><a href="/karya" class="nav-link">Karya</a></li>
        <li class="nav-item"><a href="/vidio" class="nav-link">Cerita</a></li>
              </div>
            </div>
        <li class="nav-item"><a href="/rekomendasi" class="nav-link">Rekomendasi</a></li>
        {{-- <li class="nav-item"><a href="contac/about" class="nav-link">Contac</a></li>  --}}
         @can('admin') 
         <li class="nav-item"><a href="/buku" class="nav-link">Data Buku</a></li>  
         @endcan
        {{-- <li class="nav-item"><a href="/karya" class="nav-link">Karya</a></li>
        <li class="nav-item"><a href="/vidio" class="nav-link">Cerita</a></li> --}}
  
        <li class="nav-item"><a href="/halaman" class="nav-link">Menu Lainnya</a></li>    
        <li class="nav-item"><a href="/cartlist" class="nav-link">+Baca Nanti ({{ $total }})</a></li>  
        <li class="nav-item"><a  href="/user" class="nav-link">   <i class="bi bi-person">   {{ auth()->user()->name }}</i></a></li> 
  
      </ul>
    </header>








