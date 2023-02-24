<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Saldo;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::all();
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
        // $transaksi = Transaksi::all();
        // return $transaksi;
        return view('page.transaksi.create', compact("saldo"));
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
        try {
            \DB::BeginTransaction();
            $saldo = Saldo::find($request->saldo);
            // return $saldo;
        if($saldo->jumlah < $request->jumlah){
            return redirect()->to('/master/transaksi')->with('gagal', 'Saldo tidak mencukupi');
        }
        $saldo->jumlah=$saldo->jumlah-$request->jumlah;
        $saldo->update();

        Transaksi::create([
            'id_user' => Auth::user()->id,
            'nm_transaksi' => $request->nama,
            'tgl_transaksi' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'id_saldo' => $request->saldo
        ]);
        
        \DB::Commit();
         return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil menyimpan data');
        } catch (\Throwable $th) {
            \DB::Rollback();
            return $th;
        }
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

        return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil menyimpan data');
    }

    public function destroy($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil menghapus data');
    }
}
