<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function show_profil(Request $request){
        $user = User::whereIdUser($request->session()->get("id_user"))->first();
        return view("user.profil", compact("user"));
    }
    public function store_profil(Request $request){
        $request->validate([
            "no_telp" => "required|min:8|max:15",
            "no_rek" => "required|min:10|max:50"
        ]);
        User::whereIdUser($request->session()->get("id_user"))->update([
            "no_telp" => $request->no_telp,
            "no_rek" => $request->no_rek
        ]);
        return back()->with("message", "Data berhasil diupdate!");
    }
    public function create_login(){
        return view("user.login");
    }
    public function store_login(Request $request){
        $user = User::whereUsername($request->username)->wherePassword($request->password);
        if(!$user->exists()) return $this->error("Username atau password salah!", $request);

        $request->session()->put("id_user", $user->first(["id_user"])->id_user);
        return redirect()->route("user.index");
    }
    public function create_reg(){
        return view("user.register");
    }
    public function store_reg(Request $request){
        // Validasi input apakah sesuai
        $request->validate([
            "nama" => "required|min:5|max:255",
            "username" => "required|min:5|max:50",
            "password" => "required|min:5|max:255",
            "no_telp" => "required|min:8|max:16",
            "password_confirm" => "required|min:5|max:255"
        ]);
        if($request->password != $request->password_confirm)
            return $this->error("Verifikasi password salah!", $request);
        $user = User::create([
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => $request->password,
            "no_telp" => $request->no_telp,
            "no_rek" => null
        ]);
        $request->session()->put("id_user", $user->id_user);
        return redirect()->route("user.index");
    }
    public function show(Request $request){
        $id_user = $request->session()->get("id_user");
        $username = User::whereIdUser($id_user)->first(["username"])->username;
        $produks = Produk::whereIdUser($id_user)->get();
        return view("user.index", compact("produks", "username"));
    }
    public function create(){
        return view("user.create");
    }
    public function edit(string $id){
        $produk = Produk::whereIdProduk($id)->first();
        return view("user.edit", compact("produk"));
    }
    public function store(Request $request){
        $request->validate([
            "nama" => "required|min:5|max:100",
            "harga" => "required|min:4|max:500000|numeric",
            "deskripsi" => "required|min:10|max:5000",
            "image" => ["required", File::image()->max(2 * 1024)]
        ]);
        $produk = Produk::create([
            "nama" => $request->nama,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "id_user" => $request->session()->get("id_user")
        ]);
        $request->file("image")->move(public_path()."/images", $produk->id_produk);
        return redirect()->route("user.index")->with("message", "Produk berhasil dibuat!");
    }
    public function update(Request $request){
        $request->validate([
            "id_produk" => "required|min:1|numeric",
            "nama" => "required|min:5|max:100",
            "harga" => "required|min:4|max:500000|numeric",
            "deskripsi" => "required|min:10|max:5000",
            "image" => File::image()->max(2 * 1024)
        ]);
        $produk = Produk::whereIdProduk($request->id_produk)->whereIdUser($request->session()->get("id_user"));
        if(!$produk->exists()) return redirect()->route("user.index");
        $produk->update([
            "nama" => $request->nama,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi
        ]);
        if($request->hasFile("image"))
            $request->file("image")->move(public_path()."/images", $request->id_produk);
        return redirect()->route("user.index")->with("message", "Produk berhasil diupdate!");
    }
    public function destroy(Request $request){
        $request->validate([ "id_produk" => "required|min:1|numeric" ]);
        $produk = Produk::whereIdProduk($request->id_produk)->whereIdUser($request->session()->get("id_user"));
        if(!$produk->exists()) return redirect()->route("user.index");
        unlink(public_path()."/images/".$request->id_produk);
        $produk->delete();
        return redirect()->route("user.index")->with("message", "Produk berhasil dihapus");
    }
    public function error(string $msg, Request $request = null){
        $res = back()->withErrors($msg);
        if($request != null) $res = $res->withInput($request->input());
        return $res;
    }
}
