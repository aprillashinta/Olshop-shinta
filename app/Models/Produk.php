<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Produk
 *
 * @property int $id_produk
 * @property string $nama
 * @property int $harga
 * @property string $deskripsi
 * @property string $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereIdProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Produk extends Model
{
    use HasFactory;
    protected $table = "produk",
        $primaryKey = "id_produk",
        $fillable = ["nama", "harga", "deskripsi", "id_user"];
    public $incrementing = true;
}
