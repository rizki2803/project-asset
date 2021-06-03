<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_bar extends Model
{
    use HasFactory;

    protected $table = "master_bar";

    protected $fillable = ["mb_id", "mb_kode", "mb_nmbar", "mb_satbar", "mb_katbar", "mb_jmlbar"];

}
