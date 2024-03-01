<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(){
        $produks = Produk::from("produk AS p")->join("users AS u", "u.id_user", "=", "p.id_user")
            ->get(["p.id_produk", "p.nama", "p.harga", "u.username"]);
        return view("index", compact("produks"));
    }
    public function detail(string $id){
        $produk = Produk::from("produk AS p")->join("users AS u", "u.id_user", "=", "p.id_user")
            ->whereIdProduk($id);
        if(!$produk->exists()) return redirect()->route("index");
        $produk = $produk->first(["p.id_produk", "p.nama", "p.deskripsi", "p.harga", "u.username", "u.no_telp"]);
        return view("detail", compact("produk"));
    }
}
