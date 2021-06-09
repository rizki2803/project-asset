<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = "kat_bar";

    protected $fillable = ["kt_id", "kt_kode", "kt_nm", "kt_cr_by", "kt_cr_at", "kt_up_by", "kt_up_at"];

}
