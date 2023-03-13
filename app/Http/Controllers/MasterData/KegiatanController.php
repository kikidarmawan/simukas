<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::all();
        return view('page.kegiatan.index', [
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
        return view('page.kegiatan.create');
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
            'nm_kegiatan'  => 'required|string|max:100',
            'tgl_kegiatan'    => 'required',
            'jumlah_pengeluaran'    => 'required|numeric|min:0',
            'jumlah_pemasukan'    => 'required|numeric|min:0'
        ]);

        kegiatan::create([
            'nm_kegiatan'  => $request->nm_kegiatan,
            'tgl_kegiatan'    => $request->tgl_kegiatan,
            'jumlah_pengeluaran'    => $request->jumlah_pengeluaran,
            'jumlah_pemasukan'    => $request->jumlah_pemasukan
        ]);

        return redirect()->to('/master/kegiatan')->with('berhasil', 'Berhasil menyimpan data');
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
        $kegiatan = kegiatan::findOrFail($id);
        return view('page.kegiatan.edit', compact('kegiatan'));
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
        // return $request->all();
        $kegiatan=kegiatan::find($id);
        $kegiatan->update([
            'nm_kegiatan'  => $request->nm_kegiatan,
            'tgl_kegiatan'    => $request->tgl_kegiatan,
            'jumlah_pengeluaran'    => $request->jumlah_pengeluaran,
            'jumlah_pemasukan'    => $request->jumlah_pemasukan
        ]);


        return redirect()->to('/master/kegiatan')->with('berhasil', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan=kegiatan::find($id);
        $kegiatan->delete();

        return redirect()->to('/master/kegiatan')->with('berhasil', 'Berhasil menghapus data');
    }
}
