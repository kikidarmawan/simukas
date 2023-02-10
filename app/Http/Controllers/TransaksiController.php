<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
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
        return view('page.transaksi.create');
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $transaksi = Transaksi::create([
            'id_user' => Auth::user()->id,
            'nm_transaksi' => $request->nama,
            'tgl_transaksi' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,

        ]);
        return redirect()->to('/master/transaksi')->with('berhasil', 'Berhasil menyimpan data');
    }
}
