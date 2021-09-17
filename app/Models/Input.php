<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $table = "in_bar";

    protected $fillable = ["in_id", "in_asst", "in_tgl", "in_vndr", "mb_id", "in_pjwb",
                            "in_ket", "in_jml", "p_id", "s_id", "in_cr_by", "in_cr_at", "in_up_by",
                            "in_up_at"];

}
