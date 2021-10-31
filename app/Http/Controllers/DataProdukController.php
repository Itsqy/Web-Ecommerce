<?php
 
namespace App\Http\Controllers;

use App\Models\data_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
 
class DataProdukController extends Controller
{
    public function dataproduk()
    {
        $title = "Data Produk";
    	// mengambil data dari table pegawai
    	$data_produk = DB::table('data_produk')->get();
        // $data_produk = data_produk::all();
        $i = 1;
    	// mengirim data pegawai ke view index
    	return view('user.konten.dataproduk',[
            'data_produk' => $data_produk,
            'i' => $i,
            'title' => $title
    ]);
 
    }
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('data_produk')->insert([
            'nama_produk' => $request->namaproduk,
            'harga' => $request->harga,
            'sedia' => $request->sedia,
            'berat' => $request->berat,
            'image' => $request->file('image')->store('image-data'),
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/dataproduk');
     
    }
 // method untuk edit data pegawai
public function editdata($id)
{
    $title = "Edit Data Produk";
	// mengambil data pegawai berdasarkan id yang dipilih
	$data_produk = DB::table('data_produk')->where('id',$id)->get();
	// passing data pegawai yang didapat ke view edit.blade.php
	return view('user.konten.editdata',['data_produk' => $data_produk,
'title' => $title]);

}
    // update data pegawai

    // update data pegawai
public function update(Request $request)
{
	// update data pegawai
    if (empty($request->file('image'))) {
	DB::table('data_produk')->where('id',$request->id)->update([
        'nama_produk' => $request->namaproduk,
        'harga' => $request->harga,
        'sedia' => $request->sedia,
        'berat' => $request->berat,
        // 'image' => $request->file('image')->store('image-data'),
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/dataproduk');
    } else {
    DB::table('data_produk')->where('id',$request->id)->update([
        'nama_produk' => $request->namaproduk,
        'harga' => $request->harga,
        'sedia' => $request->sedia,
        'berat' => $request->berat,
        'image' => $request->file('image')->store('image-data'),
    ]);
	// alihkan halaman ke halaman pegawai
	return redirect('/dataproduk');
    }
    // public function tambah()
    // {
    //     $title = "Data Produk";
    // 	// mengambil data dari table pegawai
    	
    //     $i = 1;
    // 	// mengirim data pegawai ke view index
    // 	return view('user.konten.tambahdata',[
            
    //         'i' => $i,
    //         'title' => $title
    // ]);
 
    // }
    }
}