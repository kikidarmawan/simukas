<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Saldo;
use App\Models\kegiatan;
use App\Models\SaldoMutasi;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
         $data = Transaksi::with(['kegiatan'])->orderBy('created_at', 'desc')->get();
        return view('page.transaksi.index', compact('data'));

    }

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $saldo= Saldo::all();
        $kegiatan= kegiatan::all();
        // $transaksi = Transaksi::all();
        // return $transaksi;
        return view('page.transaksi.create', compact("saldo", "kegiatan"));


    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
            $saldo = Saldo::find($request->saldo);
            $kegiatan = kegiatan::find($request->id_kegiatan);
            // return $saldo;
        if($saldo->jumlah < $request->jumlah){
            return redirect()->to('/master/transaksi')->with('gagal', 'Saldo tidak mencukupi');
        }

        $transaksi = Transaksi::create([
            'id_user' => Auth::user()->id,
            'nm_transaksi' => $request->nama,
            'tgl_transaksi' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'id_saldo' => $request->saldo,
            'id_kegiatan' => $kegiatan->id
        ]);

        // $kegiatan = kegiatan::create([
        //     'id_kegiatan' => $request->kegiatan,
        // ]);

        $mutasi = SaldoMutasi::create([
            'id_saldo' => $saldo->id,
            'jumlah' => $request->jumlah,
            'jumlah_sebelum' => $saldo->jumlah,
            'jumlah_sesudah' => $saldo->jumlah - $request->jumlah,
            'jns_transaksi' => "Transfer",
            'id_transaksi' => $transaksi->id,
            'keterangan' => $request->keterangan,

        ]);

        $saldo->jumlah=$saldo->jumlah-$request->jumlah;
        $saldo->update();


         return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil Membuat Transaksi');
    }

    public function edit($id)
    {
        $transaksi= Transaksi::find($id);
        return view('page/transaksi/edit',compact('transaksi'));
    }

    public function update(Request $request, $id){
        $transaksi= Transaksi::find($id);
        $transaksi->update([
            'id_user' => Auth::user()->id,
            'nm_transaksi' => $request->nama,
            'tgl_transaksi' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil Mengubah Data Transaksi');
    }

    public function destroy($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil Menghapus Data Transaksi');
    }
}
