<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    // fungsi untuk mendapatkan seluruh harga total
    public function countTotal($pesanan){
        // untuk menampung daftar harga yang ada dalam pesanan
        $harga = [];
        $total = 0;


        // looping untuk mencari harga yang ada dalam pesanan dalam model Menu
        foreach ( $pesanan as $pesan ){
            try {
                $menu = Menu::where('nama',$pesan)->first();
                $harga[] = $menu->harga;
            } catch (Exception $e){
                $menu[] = '';
            }
        }

        // looping untuk men total seluruh harga
        foreach ( $harga as $h ){
            $total += $h;
        }

        return $total;

    }

    public function addOrder(Request $request){
        // data pesanan
        $pesanan = ['Cappuchino','Americano','V60'];
        
        // membuat new object dari kelas payment
        $payment = new Payment();

        $data = [
            'nama' => $request->nama,
            'jumlah_pesanan' => count($pesanan),
            'total_pesanan' => $this->countTotal($pesanan),
            'status' => 'member',
            'diskon' => $payment->diskon('member',$this->countTotal($pesanan)), 
            'total_pembayaran' => $payment->getPayment('member',$this->countTotal($pesanan))
        ];


        // mengembalikan ke halaman view home dengan mengirim data
        return view('home',compact('data'));
    }
}


// membuat interface Diskon
interface Diskon
{
    // method diskon
    public function diskon($status,$total_pesanan);
}


// membuat class implements dari interface diskon
class Hitung implements Diskon {

    // membuat method diskon 
    public function diskon($status,$total_pesanan){
        // melakukan pengecekan untuk menetapkan diskon
        if ( $status == 'member' && $total_pesanan >= 100000){
            return '20%';
        } else {
            return '10%';
        }
    }

} 

// Membuat class payment yang merupakan inheritance dari class Hitung
class Payment extends Hitung {
    
    // membuat method get payment
    public function getPayment($status,$total_pesanan){
        // mengambil jumlah diskon lalu cek pengkondisian sesuai diskon
        $diskon = $this->diskon($status,$total_pesanan);
        if ( $diskon == '20%'){
            return $total_pesanan - ($total_pesanan * (20/100));
        } else {
            return $total_pesanan - ($total_pesanan * (10/100));
        }

    }

}