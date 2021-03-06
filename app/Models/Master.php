<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = "master_bar";

    protected $fillable = ["mb_id", "mb_kode", "mb_nmbar", "sb_id", "kt_id", "mb_jml",
                            "mb_minjml", "mb_cr_by", "mb_cr_at", "mb_up_by", "mb_up_at"] ;

}
