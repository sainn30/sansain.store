<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $Barang = Barang::all();
        return view('dashboard', compact('Barang'));
    }

    public function checkOut()
    {
        $barang = Barang::all(); // Ambil semua data barang dari database
        return view('some.view', compact('barang'));
    }

    public function dashboard()
    {
        $users = User::all();
    
        // Debugging: dump and die data
        dd($users);
    
        return view('dashboard', compact('users'));
    }

    
}