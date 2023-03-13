<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\SaldoMutasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $dataSaldo = [];
        $dataPengeluaran = [];
        $tahun = date('Y');
        for ($bulan=1; $bulan <= 12; $bulan++) {
            $saldo = Saldo::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->sum('jumlah');
            $pengeluaran = Transaksi::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->sum('jumlah');
            $dataSaldo[] = $saldo;
            $dataPengeluaran[] = $pengeluaran;
        }
        
        $saldo = Saldo::sum( 'jumlah');
        $transaksi = Transaksi::sum('jumlah');
        $pemasukan = SaldoMutasi::sum('jumlah');
        $banyakTransaksi = Transaksi::count();
        return view('page.dashboard', compact('dataSaldo', 'dataPengeluaran', 'saldo', 'transaksi', 'banyakTransaksi', 'pemasukan'));
    }

     
}
