<?php

namespace App\Http\Controllers\Landing;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{




    public function index()
    {
        // $pesanan = Pesanan::where('user_id', optional(Auth::user())->id)->where('status', 0)->first();
        // if ($pesanan) {
        //     $jumlah = optional(DetailPesanan::where('pesanan_id', $pesanan->id))->count();
        // }
        $title = 'web utama';
        $produk = Produk::take(4)->orderBy('id', 'desc')->get();
        return view('landing.yield.index', [

            'title' => $title,
            'produk' => $produk,
            // 'jumlah' => $jumlah,


        ]);
    }
    public function detailProduk($slug)
    {


        $title = "Detail PRoduk";
        $produk = Produk::where('slug', $slug)->first();
        return view('landing.yield.detail', [
            'title' => $title,
            'produk' => $produk,

        ]);
    }
    public function perkategori($slug)
    {
        $nm_kt = Kategori::where('slug', $slug)->first();
        $title = "kategori $nm_kt->nama_kategori";
        $produk = Produk::where('kategori_id', $nm_kt->id)->get();
        return view('landing.yield.per-kategori', compact('produk', 'title', 'nm_kt'));
    }



    public function semuaproduk()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if ($pesanan) {
            $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
        }

        $title = 'semuaproduk';
        $produk = Produk::orderBy('id', 'desc')->get();
        return view('landing.yield.semua', compact('title', 'produk',));
    }
    public function searchproduk(Request $request)
    {

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if ($pesanan) {
            $jumlah = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
        }

        $keyword = $request->cari;
        $title = 'search produk';
        $produk = Produk::where('nama', 'like', "%" . $keyword . "%")->get();
        return view('landing.yield.search', compact('title', 'produk', 'keyword', 'jumlah'));
    }

    public function tambahproduk(Request $request)
    {
        // return dd($request);

        $harga_detail = $request->harga * $request->jumlah;

        // cek apakah user punya pesanan utama

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // save atau update pesanan utama

        if (empty($pesanan)) {
            Pesanan::create([
                'user_id'        => Auth::user()->id,
                'status'         => 0,
                'total_harga'    => $harga_detail,
                'kode_pemesanan' => "terserah",
                'kode_unik'      => mt_rand(100, 999)
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $karakter_kode = '01234567890QWERTTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
            $pesanan->kode_pemesanan = substr(str_shuffle($karakter_kode), 0, 12);
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $harga_detail;
            $pesanan->update();
        }

        // menyimpn detail pesanan


        if (empty($request->catatan)) {
            DetailPesanan::create([
                'produk_id' => $request->id,
                'pesanan_id' => $pesanan->id,
                'jumlah_pesanan' => $request->jumlah,
                'harga' => $harga_detail,
                'catatan' => 'catatan kosong'
            ]);
        } else {
            DetailPesanan::create([
                'produk_id' => $request->id,
                'pesanan_id' => $pesanan->id,
                'jumlah_pesanan' => $request->jumlah,
                'harga' => $harga_detail,
                'catatan' => $request->catatan,
            ]);
        }




        return redirect()->back()->with('Success', 'berhasil menambahkan produk!');
    }



    public function keranjang()
    {
        $details = [];
        $i = 1;
        $title = 'keranjang';
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if ($pesanan) {
            $details = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
        }

        return view('landing.yield.keranjang', compact('title', 'details', 'pesanan', 'i'));
    }

    public function destroy($id)
    {

        $details = DetailPesanan::findOrFail($id);
        $produk = Produk::where('id',  $details->produk_id)->first();

        if (!empty($details)) {
            $pesanan = Pesanan::where('id', $details->pesanan_id)->first();
            $jumlah_pesanan_detail = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            } else {
                $pesanan->total_harga = $pesanan->total_harga - $details->harga;
                $pesanan->update();
            }

            $details->delete();
        }

        return redirect()->back()->with('Success', "$produk->nama berhasil dihapus");
    }
    public function pembayaran()
    {

        $title = "bayar";

        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        }

        return view('landing.yield.pembayaran', [
            'title' => $title,
            'pesanan' => $pesanan
        ]);
    }

    public function addressupdate(Request $request)
    {
        // dd($request);
        $user = User::where('id', $request->id)->first();
        $user->address = $request->address;
        $user->update();

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();


        return redirect()->route('landing.history');
    }
    public function history()
    {

        $i = 1;
        $title = 'history';
        //nyari user pesanna berdasarkan ID
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1, 2)->get();
        //nyari detailpesanna berdasarkan pesanan id

        if ($pesanan) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->get();
        }

        return view('landing.yield.history', compact('title', 'pesanan', 'i'));
    }
}
