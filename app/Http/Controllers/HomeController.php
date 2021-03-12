<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function index()
	{
    		// mengambil data dari table barang
		$kamar = DB::table('Kamar')->paginate(5);
	
 
    		// mengirim data barang ke view index
		return view('home',['kamar' => $kamar]);
 
	}
	public function tambahbooking($id)
       {
        $kamar = Kamar::find($id);
        return view('booking',['kamar' => $kamar]);
       }
}
