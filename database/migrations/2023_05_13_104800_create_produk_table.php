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
        Schema::create('produk', function (Blueprint $table) {
            $table->id("id_produk")->autoIncrement();
            $table->string("nama");
            $table->integer("harga");
            $table->text("deskripsi");
            $table->string("id_user", 36);
            $table->timestamps();
            $table->foreign("id_user")->references("id_user")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
