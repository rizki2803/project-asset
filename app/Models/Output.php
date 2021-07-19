<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $table = "out_bar";

    protected $fillable = ["out_id", "out_tgl", "mb_id", "out_pjwb", "p_id", "s_id",
                            "out_ket", "out_jml", "out_cr_by", "out_cr_at", "out_up_by", "out_up_at"];

}
