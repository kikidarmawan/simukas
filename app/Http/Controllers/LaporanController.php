<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Transaksi;
use App\models\Laporan;
use App\models\Saldo;
use App\models\SaldoMutasi;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $dataJumlah = [];
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $tanggal = [];

        for($hari=1; $hari <= $jumlahHari; $hari++){
            $transaksiJumlah = Transaksi::whereDay('tgl_transaksi', $hari)->sum('jumlah');

            $dataJumlah[] = $transaksiJumlah;
            $tanggal[] = $hari . '-' . $bulan;
        }

            return view('page.laporan.index', compact ('dataJumlah', 'tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function Laporan()
    {

        return $this->belongsTo('mutasi');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
