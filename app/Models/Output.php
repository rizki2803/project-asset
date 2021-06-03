<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class out_bar extends Model
{
    use HasFactory;

    protected $table = "out_bar";

    protected $fillable = ["out_id", "out_tgl", "mb_id", "out_pjwb", "p_id", "out_ket"];

}
