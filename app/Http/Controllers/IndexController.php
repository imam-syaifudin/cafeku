<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index(){

        // Ambil data menu
        $menu = Menu::all();

        // Mengirim data menu ke view menu
        return view('index',compact('menu'));
    }
}
