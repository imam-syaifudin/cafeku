<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // mengambil seluruh data kategori
         $menu = Menu::all();

         // mereturn ke view halaman all menu dan mengirim data menu
         return view('menu.menu',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // mengambil seluruh data kategori
        $kategori = Kategori::all();
        
        // mereturn ke view halaman tambah menu dan mengirim data kategori
        return view('menu.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengambil seluruh inputan user
        $data = $request->all();


        // Query upload foto pada menu dan mereplace untuk mengambil lokasi penyimpanan
        $data['foto'] = $request->file('foto')->store('menu/foto');


        // melakukan query create dengan method create()
        Menu::create($data);

        
        // redirect ke halaman menu setelah menu berhasil di tambah
        return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // mengambil seluruh data kategori
        $kategori = Kategori::all();
        
        // mereturn ke view halaman edit menu dan mengirim data menu yang ingin di edit serta mengirim data kategori
         return view('menu.edit',compact('menu','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
         // mengambil seluruh inputan user
         $data = $request->all();
         

         if ( $request->file('foto') !== NULL ){
            Storage::delete($menu->foto);
            $data['foto'] = $request->file('foto')->store('menu/foto');
         } else {
             // Query upload foto pada menu dan mereplace untuk mengambil lokasi penyimpanan
             $data['foto'] = $menu->foto;
         }


         // melakukan query update dengan method update()
         $menu->update($data);

         // redirect ke halaman menu setelah menu berhasil di update
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //

         // Delete gambar pada storage
         Storage::delete($menu->foto);

         // melakukan query delete dengan method delete()
         $menu->delete();

         // redirect ke halaman menu setelah menu berhasil dihapus
         return redirect('/menu');
    }
}
