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
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Sukses Check Out</h3>
                        <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer <br> di rekening <strong>Bank BSI Nomer Rekening : 32113-821312-123</strong> <br> atau bisa langsung japri di no wa : <strong>0812-9918-4709</strong> <br> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>

                    </div>
                </div>
                <div class="card mt-2 mb-4">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                        @if(!empty($pesanan))
                        <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>

                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_details as $pesanan_detail)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                    </td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }} Madu</td>
                                    <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    
                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Biaya Penanganan :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Yang Harus Dibayar :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>

                                </tr>
                            </tbody>
                        </table>
                        @endif
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
