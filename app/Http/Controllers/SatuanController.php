<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{

    public function index()
    {
        $satuan = Satuan::all();
        return view('satuan.index', compact('satuan'));
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            $satuan = new Satuan;
            $satuan->nama = $request->nama;
            $satuan->save();


            return redirect('/admin/satuan')->with('sukses', 'Data Berhasil di Simpan');
        }catch(\Exception $e){
            return redirect('/admin/satuan')->with('gagal', 'Data Tidak Berhasil di Simpan. Pesan Kesalahan: '.$e->getMessage());
        }
    }


    public function show()
    {

    }

    public function edit($id)
    {
        $satuan = Satuan::find($id);

        return view('satuan.edit', compact('satuan'));
    }


    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            $satuan = Satuan::find($id);
            $satuan->nama = $request->nama;
            $satuan->update();

            return redirect('/admin/satuan')->with('sukses', 'Data Berhasil di Edit');
        }catch(\Exception $e){
            return redirect('/admin/satuan')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();

        return redirect('/admin/satuan')->with('sukses', 'Data Berhasil di Hapus');
    }
}
