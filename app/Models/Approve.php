<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    use HasFactory;

    protected $table = "aprv";

    protected $fillable = ["a_id", "a_seq", "a_nm", "a_nik", "p_id", "a_stat", "a_cur_p",
                             "a_cr_by", "a_cr_at", "a_up_by", "a_up_at", "a_expr"];

}
