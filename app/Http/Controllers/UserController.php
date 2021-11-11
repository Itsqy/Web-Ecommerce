<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $title = 'index';
        $JumlahUser = User::where('role', 'user')->count();
        return view('user.konten.index', [
            'JumlahUser' => $JumlahUser,
            'title' => $title
        ]);
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

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $title = 'show';
        $User = User::where('username', $username)->first();
        return view('user.konten.show', [
            'User' => $User,
            'title' => $title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $User = User::where('username', $username)->first();
        return view('user.konten.edit', [
            'User' => $User,
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
    public function update(Request $request, $username)
    {

        // return ddd($request);
        $title = "My Profile";

        if (empty($request->image)) {
            $User = User::where('username', $username)->first();
            $User->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
                // 'image' => $request->file('image')->store('image-user'),
            ]);
            return view('user.konten.show', [
                'User'          => $User,
                'title' => $title
            ]);
        } else {
            $User = User::where('username', $username)->first();
            $User->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
                'image'         => $request->img,
            ]);
            return view('user.konten.show', [
                'User'          => $User,
                'title' => $title
            ]);
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
        //
    }
    public function table()
    {
        $title = "Table User";
        $user = user::all();
        $i = 1;
        return view('user.konten.tableuser', [
            'user' => $user,
            'title' => $title,
            'i' => $i
        ]);
    }
    public function search(Request $request)
    {
        $title = 'search';
        $keyword = $request->search;
        $JumlahUser = User::all()->count();
        $user = User::where('username', 'like', "%" . $keyword . "%")->paginate(5);
        return view('user.konten.tableuser', compact('user', 'title', 'JumlahUser'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
