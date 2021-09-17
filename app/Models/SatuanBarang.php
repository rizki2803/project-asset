<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;

    protected $table = "sat_bar";

    protected $fillable = ["sb_id", "sb_nm", "sb_cr_by", "sb_cr_at", "sb_up_by", "sb_up_at"];

}
