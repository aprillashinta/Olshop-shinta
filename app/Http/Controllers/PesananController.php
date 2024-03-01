<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function show(Request $request){
        $produks = Produk::whereIdUser($request->session()->get("id_user"))->get(["id_produk"]);
        $pesanan = Pesanan::from("pesanan AS p")->where(function (\Illuminate\Database\Eloquent\Builder $pesanan) use ($produks){
            foreach($produks as $produk){
                $pesanan->orWhere("p.id_produk", "=", $produk->id_produk);
            }
        })->join("produk AS r", "p.id_produk", "=", "r.id_produk")->get();
        return view("user.pesanan", compact("pesanan"));
    }
    public function show_user(Request $request){
        $pesanan = Pesanan::from("pesanan AS p")->whereIdPembeli($request->cookie("id_pembeli"))
            ->join("produk AS r", "r.id_produk", "=", "p.id_produk")
            ->join("users AS u", "u.id_user", "=", "r.id_user")->get(["r.nama AS nama_produk", "p.no_telp", "u.no_rek", "p.status"]);
        return view("pesanan", compact("pesanan"));
    }
    public function store(Request $request){
        $request->validate([
            "id_produk" => "required|min:1|numeric",
            "nama_lengkap" => "required|min:5",
            "no_telp" => "required|min:8",
            "alamat_lengkap" => "required|min:15"
        ]);

        $id_pembeli = $request->cookie("id_pembeli");
        $new = false;
        if($id_pembeli == null){
            $id_pembeli = \Str::uuid();
            $new = true;
        }
        $produk = Produk::whereIdProduk($request->id_produk);
        if(!$produk->exists())
            return redirect()->route("index");
        Pesanan::create([
            "id_pembeli" => $id_pembeli,
            "id_produk" => $request->id_produk,
            "nama_lengkap" => $request->nama_lengkap,
            "no_telp" => $request->no_telp,
            "alamat_lengkap" => $request->alamat_lengkap,
            "status" => "pembayaran"
        ]);

        $user = User::whereIdUser($produk->first(["id_user"])->id_user)->first(["no_rek"]);
        $res = redirect()->route("pesanan")->with("no_rek", $user->no_rek);
        if($new) $res = $res->withCookie(cookie(    "id_pembeli", $id_pembeli));
        return $res;
    }
    public function konfirmasi_pembayaran(Request $request){
        $request->validate([ "id_pesanan" => "required|min:36|max:36" ]);
        Pesanan::whereIdPesanan($request->id_pesanan)->update([ "status" => "pengiriman" ]);
        return redirect()->route("user.pesanan")->with("message", "Pembayaran berhasil dikonfirmasi!");
    }
    public function konfirmasi_pengiriman(Request $request){
        $request->validate([ "id_pesanan" => "required|min:36|max:36" ]);
        Pesanan::whereIdPesanan($request->id_pesanan)->update([ "status" => "selesai" ]);
        return redirect()->route("user.pesanan")->with("message", "Pengiriman selesai!");
    }
}
