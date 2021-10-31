<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class EditPassword extends Controller
{
    public function edit()
    {
        $title = "Ganti Password";

        return view('user.konten.password', [

            'title' => $title
        ]);
    }
    public function updatePass(ChangePasswordRequest $request)
    {
        $old_pass = auth()->user()->password;
        $user_id = auth()->user()->id;

        if (!Hash::check($request->input('password'), $old_pass)) {
            if (Hash::check($request->input('old_password'), $old_pass)) {
                $user = User::find($user_id);
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->back()->with('Success', 'Password Berhasil Diubah!');
            } else {
                return redirect()->back()->with('Failed', 'Password Salah!');
            }
        } else {
            return redirect()->back()->with('Failed', 'Password Tidak Boleh Sama!');
        }
    }
}
