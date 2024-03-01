<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->uuid("id_pesanan");
            $table->string("id_pembeli", 36);
            $table->string("no_telp");
            $table->string("nama_lengkap");
            $table->string("alamat_lengkap");
            $table->integer("id_produk");
            $table->enum("status", ["pembayaran", "pengiriman", "selesai"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};
