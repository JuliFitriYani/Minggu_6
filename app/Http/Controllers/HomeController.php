<?php

namespace App\Http\Controllers;

/**
 * 
 */
class HomeController extends Controller{
	
	function showAdmin(){
		return view('admin.admin');
	}
	function showAbout(){
		return view('about');
	}
	function showSale(){
		return view('sale');
	}
	function showProduct(){
		return view('product');
	}
	function showContact(){
		return view('contact');
	}
	function showPelanggan(){
		return view('pelanggan');
	}
	function showSupplier(){
		return view('supplier');
	}
	
}