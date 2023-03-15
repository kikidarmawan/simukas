<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengguna::all();
        return view('page.Pengguna.index', [
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
        return view('page.Pengguna.create');
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
            'name'  => 'required|string|max:100',
            'email'    => 'required',
            'password'    => 'required'
        ]);

        Pengguna::create([
            'name'  => $request->name,
            'email'    => $request->email
        ]);

        return redirect()->to('/master/Pengguna')->with('berhasil', 'Berhasil menyimpan data');
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

     public function cekPengguna(Request $request)
     {

         //  dd($user, $request->all());
         $validate = $this->validate($request, [
             'password'    => 'required'
             ]
            );

            $user = Auth::user();
       try {
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password tidak sesuai');
        }

        $pengguna = Pengguna::findOrFail($request->id_pengguna);
        return view('page.pengguna.edit', compact('pengguna'));
       } catch (\Throwable $th) {
        throw $th;
       }

     }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('page.pengguna.edit', compact('pengguna'));
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
        $pengguna=Pengguna::find($id);
        $pengguna->update([
            'name'  => $request->name,
            'email'    => $request->email
        ]);


        return redirect()->to('/master/Pengguna')->with('berhasil', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pengguna = Pengguna::find($id);
        $Pengguna->delete();

        return redirect()->to('/master/pengguna')->with('berhasil', 'Berhasil menghapus data');
    }
}
