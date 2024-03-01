<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pesanan
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan query()
 * @property string $id_pesanan
 * @property string $id_pembeli
 * @property string $no_telp
 * @property string $nama_lengkap
 * @property string $alamat_lengkap
 * @property int $id_produk
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereAlamatLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereIdPembeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereIdPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereIdProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereNoTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pesanan extends Model
{
    use HasFactory, HasUuids;
    protected $table = "pesanan",
        $primaryKey = "id_pesanan",
        $fillable = ["id_pembeli", "id_produk", "status", "nama_lengkap", "no_telp", "alamat_lengkap"];
}
