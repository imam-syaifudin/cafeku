<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // mengambil seluruh data user
        $user = User::all();

        // mereturn ke view halaman all user dan mengirim data user
        return view('user.user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // mereturn ke view halaman tambah user 
        return view('user.create');
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
         // mengambil seluruh inputan user
         $data = $request->all();
         
         // enskripsi password
         $data['password'] = bcrypt($request->password);

         // melakukan query create dengan method create()
         User::create($data);
         
         // redirect ke halaman user setelah user berhasil di tambah
         return redirect('/user');
    }

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
        //
        // mengambil seluruh data User
        $user = User::findOrFail($id);
        
        // mereturn ke view halaman edit user dan mengirim data user yang ingin di edit
         return view('user.edit',compact('user'));
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
        //
        // mengambil satu data User
        $user = User::findOrFail($id);
        // mengambil seluruh inputan user
        $data = $request->all();
         
        // enskripsi password
        $data['password'] = bcrypt($request->password);

        // melakukan query create dengan method create()
        $user->update($data);
        
        // redirect ke halaman user setelah user berhasil di tambah
        return redirect('/user');
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
        // mengambil satu data User
        $user = User::findOrFail($id);

        // query delete
        $user->delete();

         // redirect ke halaman user setelah user berhasil di hapus
         return redirect('/user');
    }
}
