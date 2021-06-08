<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = "kat_bar";

    protected $fillable = ["kt_id", "kt_kode", "kt_nm"];

}
