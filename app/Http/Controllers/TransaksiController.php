<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\TransaksiSementara;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksi = Transaksi::orderBy('tanggal', 'desc')->get();

        return view('laporan.index', compact('transaksi'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($kodeTransaksi)
    {
        $data = TransaksiDetail::where('kode_transaksi', $kodeTransaksi)->get();

        return view('laporan.view', compact('data'));
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }


    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }


    public function destroy(Transaksi $transaksi)
    {

    }

    public function print($kode_transaksi)
     {
        $id_transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $transaksi = Transaksi::find($id_transaksi->id);
        $transaksi_detail = TransaksiDetail::where('kode_transaksi', $kode_transaksi)->get();

        $pdf = Pdf::loadView('laporan.print', compact('transaksi', 'transaksi_detail'));
        return $pdf->stream();
    }

    public function cari(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $tanggalSampai = Carbon::parse($sampai)->addDays(1)->format('Y-m-d');

        $transaksi = Transaksi::whereBetween('tanggal', [$dari, $tanggalSampai])->get();

        return view('laporan.cari',compact('transaksi', 'dari', 'sampai'));
    }

    public function printTanggal($dari, $sampai)
    {
        $tanggalSampai = Carbon::parse($sampai)->addDays(1)->format('Y-m-d');
        $transaksi = Transaksi::whereBetween('tanggal', [$dari, $tanggalSampai])->get();

        $totalAll = 0;
        foreach($transaksi as $data)
        {
            $totalAll += $data->total;
        }

        $total = number_format($totalAll, 0, ',', '.');

        $pdf = Pdf::loadView('laporan.printTanggal', compact('transaksi', 'dari', 'sampai', 'total'));
        return $pdf->stream();
    }
}
