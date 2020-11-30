<?php 
namespace App\Http\Controllers;
use App\Models\Produk;
class ProdukController extends Controller{
	function index(){
		$data['list_produk'] = Produk::all();

		return view('produk.index', $data);
	}
	function create(){
		return view('produk.create');
	}
	function store(){
		$produk = new Produk;
		$produk->nama = request ('nama');
		$produk->stok = request ('stok');
		$produk->harga = request ('harga');
		$produk->berat = request ('berat');
		$produk->deskripsi = request ('deskripsi');
		$produk->save();
			
			return redirect('produk')->with('success','Data Berhasil Ditambahkan');
		
	}
	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.show', $data);
	}
	function edit(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.edit', $data);
	}
	function update(Produk $produk){
	
		$produk->nama = request ('nama');
		$produk->harga = request ('harga');
		$produk->berat = request ('berat');
		$produk->stok = request ('stok');
		$produk->deskripsi = request ('deskripsi');
		$produk->save();
			
		return redirect('produk')->with('success','Data Berhasil Diedit');
	}
	function destroy(Produk $produk){
		$produk->delete();

		return redirect('produk')->with('danger','Data Berhasil Dihapus');

	}

	function filter()
    {
        $nama = request('nama');
        $stok = explode(",", request('stok'));
        $data['harga_min'] = $harga_min = request('harga_min');
        $data['harga_max'] = $harga_max = request('harga_max');
        //$data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
        //$data['list_produk'] = Produk::whereIn('stok', $stok")->get();
        $data['list_produk'] = Produk::whereBetween('harga',[$harga_min,$harga_max])->get();
        $data['nama'] = $nama;
        $data['stok'] = request('stok');
        return view('produk.index', $data);
    }
}