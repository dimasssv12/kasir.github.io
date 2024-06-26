<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
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

            $kategori = new Kategori;
            $kategori->nama = $request->nama;
            $kategori->save();


            return redirect('/admin/kategori')->with('sukses', 'Data Berhasil di Simpan');
        }catch(\Exception $e){
            return redirect('/admin/kategori')->with('gagal', 'Data tidak Berhasil di Simpan. Pesan Kesalahan: '.$e->getMessage());
        }
    }


    public function show()
    {

    }


    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('kategori.edit', compact('kategori'));
    }


    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            $kategori = Kategori::find($id);
            $kategori->nama = $request->nama;
            $kategori->update();

            return redirect('/admin/kategori')->with('sukses', 'Data Berhasil di Edit');
        }catch(\Exception $e){
            return redirect('/admin/kategori')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: '.$e->getMessage());
        }
    }

    
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/admin/kategori')->with('sukses', 'Data Berhasil di Hapus');
    }
}
