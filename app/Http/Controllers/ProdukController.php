<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role !== 'Admin') {
            echo "Terlarang";
            return;
        }

        // $produk = Produk::all();
        $kategori = Kategori::all();
        $title = "Data Produk";
        $i = 1;
        $produk = Produk::orderBy('id', 'desc')->paginate(2);
        return view('user.produk.index', [
            'produk' => $produk,
            'title' => $title,
            'i' => $i,
            'kategori' => $kategori

        ]);
    }

    public function store(Request $request)
    {
        // return ddd(reque)

        // Note::create($request->all());

        Produk::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'sedia' => $request->sedia,
            'berat' => $request->berat,
            'img' => $request->file('img')->store('image-data'),
            'slug' => Str::slug($request->nama, '-'),
        ]);

        return redirect()->route('produk.index')->with('success', 'Data berhasil ditambahkan.');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
        $title = "Edit Data";
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('user.produk.edit', [
            'produk' => $produk,
            'kategori' => $kategori,
            'title' => $title
        ]);
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

        // return ddd($request);

        if (empty($request->file('img'))) {
            $produk = Produk::findOrFail($id);

            $produk->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
                'sedia' => $request->sedia,
                'berat' => $request->berat,
                'slug' => Str::slug($request->nama, '-')

            ]);
            return redirect()->route('produk.index')->with('succsess', 'Data Telah diubah!');
        } else {
            $produk = Produk::findOrFail($id);
            Storage::delete($produk->img);
            $produk->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
                'sedia' => $request->sedia,
                'berat' => $request->berat,
                'slug' => Str::slug($request->nama, '-'),
                'img' => $request->file('img')->store('image-data')
            ]);
            return redirect()->route('produk.index')->with('succsess', 'Data Telah di ubah!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete($produk->img);
        $produk->delete();
        return redirect()->route('produk.index')->with('succsess', 'Data Telah Dihapus!');
    }

    public function search(Request $request)
    {
        $title = 'search';
        $keyword = $request->search;
        $JumlahUser = produk::all()->count();
        $produk = Produk::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('user.produk.index', compact('produk', 'title', 'JumlahUser'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
