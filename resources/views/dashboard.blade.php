<x-app-layout>
    <x-slot name="header">
        <img src="{{ asset('image/logo-3.png') }}" alt="Logo"  style="width: 80px; height: 50px" class="rounded mx-auto d-block">

    </x-slot>
    
    <div class="container">
        
        <div class="py-12">
            
            <div class="row ">
                @foreach ($Barang as $barang)
                <div class="col-lg-4 ">
                    <div  class="card">
                      <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top" alt="..." style="width: auto; height: 400px">
                      <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">
                            <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                            <strong>Stok :</strong> {{ $barang->stok }} <br>
                            <strong>Berat :</strong> {{ $barang->gram }} <br>
                            <hr>
                            <strong>Keterangan :</strong> <br>
                            {{ $barang->keterangan }} 
                        </p>
                        <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary btn-block w-100"><i class="fa fa-shopping-cart"></i>   Pesan</a>
                      </div>
                    </div> 
                </div>
                @endforeach

            </div>
        
    </div>
    
    </div>
    

    <footer class="bg-light py-4" style="margin-top: 50px">
        <div data-aos="zoom-in" class="container">
            <div class="row">
                <!-- Logo dan Visi -->
                <div class="col-md-4">
                  <div class="d-flex align-items-center">
                    <!-- Logo Pesawat -->
                    <img src="{{ asset('image/logo-2.png') }}" alt="Logo" class="me-2" style="width: 100px; height: 70px; margin-buttom: 110px">
                
                    <!-- Tulisan Let's Travel -->
                    <div class="mt-4">
                        <h5 class="fw-bold text-warning" >SANSAIN STORE</h5>
                        <p>Madu alami 100% asli.</p>
                    </div>
                  </div>
                </div>
    

    
                <!-- Support -->
                <div class="col-md-2">
                    <h6 class="fw-bold">Contact Us</h6>
                    <ul class="list-unstyled">
                        <li><a href="https://www.whatsapp.com/" class="text-black" style="text-decoration: none"><i class="fab fa-whatsapp"></i>  0812-9918-4709</a></li>
                        <li><a href="https://www.instagram.com/sansain_rawhoney?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-black" style="text-decoration: none"><i class="fab fa-instagram"></i> sansain_rawhoney</a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/" class="text-black" style="text-decoration: none"><i class="fab fa-facebook"></i> Sansain Store</a></li>
                    </ul>
                </div>
    
                <!-- Social Media -->
                <div class="col-md-2">
                    <h6 class="fw-bold">Our Company</h6>
                    <ul class="list-inline">
                        <li style="white-space: nowrap;"><a href="https://maps.app.goo.gl/V5XAwvV9JSynwrF47" class="text-black" style="text-decoration: none"><i class="bi bi-geo-alt"></i>  Rumah Sehat Madu Sansain</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>
