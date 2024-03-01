<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\AuthMiddleware;
use \App\Http\Controllers\PesananController;

Route::controller(UserController::class)->prefix("user")->group(function(){
   Route::get("/register", "create_reg")->name("user.register");
   Route::post("/register", "store_reg");
   Route::get("/login", "create_login")->name("user.login");
   Route::post("/login", "store_login");

   Route::middleware(AuthMiddleware::class)->group(function (){
       Route::get("/", "show")->name("user.index");
       Route::get("/create", "create")->name("user.create");
       Route::get("/edit/{id}", "edit")->name("user.edit");
       Route::post("/", "store");
       Route::put("/", "update");
       Route::delete("/", "destroy");

       Route::get("/profil", "show_profil")->name("user.profil");
       Route::post("/profil", "store_profil");
       Route::controller(PesananController::class)->group(function (){
           Route::get("/pesanan", "show")->name("user.pesanan");
           Route::post("/pembayaran", "konfirmasi_pembayaran")->name("user.pembayaran");
           Route::post("/pengiriman", "konfirmasi_pengiriman")->name("user.pengiriman");
       });
   });
});

Route::controller(MainController::class)->group(function (){
   Route::get("/", "show")->name("index");
   Route::get("/detail/{id}", "detail")->name("detail");
});
Route::controller(PesananController::class)->prefix("pesanan")->group(function (){
    Route::get("/", "show_user")->name("pesanan");
    Route::post("/", "store");
});
