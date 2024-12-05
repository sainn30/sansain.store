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

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();
        $pesanans = Pesanan::all(); // Atau sesuai query yang Anda butuhkan

    	return view('history.index', compact('pesanans'));
    }

    public function detail($id) 
    {
        $pesanan = Pesanan::where('id', $id)->first();
    	$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan','pesanan_details'));

    }
}
