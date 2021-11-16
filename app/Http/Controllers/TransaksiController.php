<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function pending()
    {
        $i = 1;
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
        //nyari detailpesanna berdasarkan pesanaPesanan id

        // if ($pesanan) {
        //     $pesanan = Pesanan::where('user_id', Auth::user()->id)->get();
        // }
        $title = 'pending';
        return view('user.status.pending', compact('title', 'pesanan', 'i'));
    }
}
