<x-app-layout>

    <div class="container mt-5">
        <div class="row">

            <div class="col-md-12">
                <a href="{{ url('dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4
">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div data-aos="full-up" class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('uploads') }}/{{ $barang->gambar }}" width="100%" alt="">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <h2>{{ $barang->nama_barang }}</h2>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Harga</td>
                                                <td>:</td>
                                                <td>Rp. {{ number_format($barang->harga) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>:</td>
                                                <td>{{ number_format($barang->stok) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td>{{ $barang->keterangan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Berat</td>
                                                <td>:</td>
                                                <td>{{ $barang->gram }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Jumlah Pesan</td>
                                                <td>:</td>
                                                <td>
                                                     <form method="post" action="{{ url('pesan') }}/{{ $barang->id }}" >
                                                    @csrf
                                                        <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                        <button type="submit" class="btn btn-primary mt-2 ml-2"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>

                                                    </form>
                                                </td>
                                            </tr>
                                           
                                            
                                            
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                 </div>
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
