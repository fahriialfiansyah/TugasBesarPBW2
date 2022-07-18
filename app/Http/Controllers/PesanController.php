<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('user.store.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi stok
        if ($request->jumlah_pesan > $barang->stok) {
            return redirect()->route('user/store/store.index', [$id]);
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        // simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan();
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->total_harga = 0;
            $pesanan->save();
        }

        //simpan ke database pesanan details
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail();
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->total_harga = $pesanan->total_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Success', 'Pesanan Sudah Masuk Keranjang');
        return redirect()->route('user/store/store.check');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(empty($pesanan))
        {
            Alert::error('Mohon Maaf', 'Keranjang Masih Kosong');
            return redirect()->route('logicode.store');
        }
        else
        {  
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('user.store.checkout', compact('pesanan', 'pesanan_details'));
        }
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->total_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        Alert::error('Mohon Maaf', 'Pesanan Dihapus');
        return redirect()->route('user/store/store.check');
    }

    public function konfirmasi()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok -= $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('Pesanan Sukses Checkout', 'Success');
        return redirect('https://api.whatsapp.com/send?phone=6285607263377');
    }
}
