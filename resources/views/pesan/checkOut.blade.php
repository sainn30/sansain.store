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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card mt-2 mb-4">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
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
                                    <th>Aksi</th>
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
                                    <td>
                                        <form action="{{ route('checkOut.delete', $pesanan_detail->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i> Delete</button>

                                        </form>
                                    </td>
                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    <td>
                                        <a href="{{ route('konfirmasi.checkOut') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan melakukan check out ?');">
                                            <i class="fa fa-shopping-cart"></i> Check Out
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
