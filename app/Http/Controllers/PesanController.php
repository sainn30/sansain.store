<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use App\Models\pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();

    	return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        // validasi apakah melebihi stok
        if($request->jumlah_pesan > $barang->stok)
    	{
    		return redirect('pesan/'.$id);
    	}

        //cek pesanan
        $cek_pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
        
            // Periksa apakah kolom 'kode' kosong dan jika kosong, beri nilai acak
            if (empty($pesanan->kode)) {
                $pesanan->kode = mt_rand(100, 999); // Menghasilkan kode acak jika kosong
            }
        
            // Simpan pesanan
            $pesanan->save();
        }
        
        


        //ambil data pesanan baru
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();


        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();


        if (empty($cek_pesanan_detail)) 
        {
            
            //simpan data pesanan detail
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else 
    	{
    		$pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

        //jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
    	$pesanan->update();

        alert()->success('Sukses', 'Pesanan berhasil masuk keranjang.');

        return redirect('check-out');
        
    }

    public function checkOut()
    {
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
         if(!empty($pesanan))
         {
             $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
 
         }
        
        
        return view('pesan.checkOut', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        // Cari PesananDetail berdasarkan ID
        $pesanan_detail = PesananDetail::find($id);
    
        // Validasi jika data tidak ditemukan
        if (!$pesanan_detail) {
            return redirect()->route('checkOut')->withErrors('Hapus', 'Item berhasil dihapus dari keranjang');
        }
    
        // Update jumlah harga pada pesanan terkait
        $pesanan = Pesanan::find($pesanan_detail->pesanan_id);
        if ($pesanan) {
            $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
            $pesanan->update();
        }
    
        // Hapus data PesananDetail
        $pesanan_detail->delete();

    
        // Redirect dengan pesan sukses
        return redirect()->route('checkOut')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            alert()->error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
            alert()->error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        // Cari pesanan aktif (status = 0) untuk pengguna yang sedang login
        $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 0)->first();
    
        // Jika pesanan tidak ditemukan, redirect dengan pesan error
        if (!$pesanan) {
            return redirect()->route('checkOut')->withErrors('Tidak ada pesanan untuk dikonfirmasi.');
        }
    
        // Ubah status pesanan menjadi 1 (checkout selesai)
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();
    
        // Ambil semua detail pesanan
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
    
        // Simpan data pesanan ke tabel transaksi
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            if ($barang) {
                // Mengurangi stok barang sesuai dengan jumlah yang dipesan
                $barang->stok = $barang->stok - $pesanan_detail->jumlah;
                $barang->update();
            }
        }
    
        // Kirim pesan sukses
        alert()->success('Sukses', 'Pesanan sukses Check Out Lanjutkan Proses Pembayaran.');
    
        // Redirect ke halaman checkout atau dashboard
        return redirect()->route('history.detail' , ['id' => $pesanan->id]);
    }
    
}
