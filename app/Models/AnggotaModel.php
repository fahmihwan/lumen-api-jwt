<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $table = "anggota";

    protected $fillable = [
        "nama", "umur", "alamat"
    ];
}
