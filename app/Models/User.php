<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property string $id_user
 * @property string $name
 * @property string $username
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property string $nama
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNama($value)
 * @property string $no_telp
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoTelp($value)
 * @property string $no_rek
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoRek($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    use HasFactory, HasUuids;

    protected $table = "users",
        $primaryKey = "id_user",
        $hidden = ["password"],
        $fillable = ["nama", "username", "password", "no_telp", "no_rek"];
    public $timestamps = false;
}
