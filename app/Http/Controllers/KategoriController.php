<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {

        if (auth()->user()->role !== 'Admin') {
            // echo "Terlarang";
            // return;
            abort(403);
        }
        $title = "List kategori";
        $i = 1;
        $kategori = Kategori::orderBy('id', 'desc')->paginate(4);
        return view('kategori.index', [
            'kategori' => $kategori,
            'title' => $title,
            'i' => $i

        ]);
    }

    public function addKategori(Request $request)
    {
        // return dd($request);
        Kategori::create([
            'nama_kategori'  => $request->nama_kategori,
            'slug'  => Str::slug($request->nama_kategori, '-')
        ]);

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {


        $kategori = Kategori::findOrfail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori, '-')
        ]);
        return redirect()->back();
    }

    public function delkategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $produk = Produk::where('kategori_id', '=', $kategori->id);
        $produk->delete();
        $kategori->delete();

        return redirect()->back()->with('succsess', 'Data Telah Dihapus!');
    }
}
