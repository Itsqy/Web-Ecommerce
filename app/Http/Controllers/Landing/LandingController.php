<?php

namespace App\Http\Controllers\Landing;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class LandingController extends Controller
{




    public function index()
    {
        $title = 'web utama';
        $produk = Produk::take(4)->orderBy('id', 'desc')->get();
        // $kategori = Kategori::all();
        return view('landing.yield.index', [

            'title' => $title,
            'produk' => $produk,
            // 'kategori' => $kategori

        ]);
    }
    public function detailproduk($slug)
    {
        $title = 'index';
        $produk = Produk::where('slug', $slug)->first();
        // $kategori = Kategori::all();
        return view('landing.yield.detail', [
            'produk' => $produk,
            'title' => $title,
            // 'kategori' => $kategori dihapus aja karna udh ad $kategori di controller.php
        ]);
    }
    public function perkategori($slug)
    {

        $nm_kt = Kategori::where('slug', $slug)->first();
        $title = "kategori $nm_kt->nama_kategori";
        $produk = Produk::where('kategori_id', $nm_kt->id)->get();
        return view('landing.yield.per-kategori', compact('produk', 'title', 'nm_kt'));
    }
    public function semuaproduk($slug)
    {

        // $nm_kt = Kategori::where('slug', $slug)->first();
        $title = 'semuaproduk';
        $produk = Produk::orderBy('id', 'desc')->get();
        // $produk = Produk::where('kategori_id', $nm_kt->id)->get();
        return view('landing.yield.semua', compact('title', 'produk'));
    }

    public function destroy($id)
    {
        $produk = Kategori::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('succsess', 'Data Telah Dihapus!');
    }
}
