<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Saldo;
use App\Models\SaldoMutasi;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Saldo::all();
        return view('page.saldo.index', [
            'data'  => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.saldo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'  => 'required|string|max:100',
            'jumlah'    => 'required|numeric|min:0'
        ]);


    try {
        \DB::beginTransaction();
        Saldo::create([
            'nm_saldo'  => $request->nama,
            'jumlah'    => $request->jumlah
        ]);

      

        \DB::commit();

        return redirect()->to('/master/saldo')->with('berhasil', 'Berhasil Menambahkan Rekening');
    } catch (\Throwable $th) {
        \DB::rollback();
        throw $th;
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dashboard = dashboard::with('saldo')->find($saldo);
        $posts = $dashboard->posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saldo = Saldo::findOrFail($id);
        return view('page.saldo.edit', compact('saldo'));
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
        $saldo = Saldo::findOrFail($id);

        $saldo->jumlah += $request->topup;
        $saldo->update();
        $mutasi = SaldoMutasi::create([
            'id_saldo' => $saldo->id,
            'jumlah' => $request->topup,
            'jumlah_sebelum' => $saldo->jumlah,
            'jumlah_sesudah' => $saldo->jumlah + $request->topup,
            'jns_transaksi' => "TopUp",

        ]);

        return redirect()->to('/master/saldo')->with('berhasil', 'Berhasil Melakukan TopUp');

    }

    public function destroy($id)
    {
    $saldo = saldo::find($id);
    $saldo->delete();

    return redirect('/master/saldo')->with('Berhasil', 'Data Berhsil Di Hapus!');
    }
}
