<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "srvc";

    protected $fillable = ["s_id", "p_id", "s_pick", "s_stat", "s_vndr", "s_estmd",
                            "s_cr_by", "s_cr_at", "s_up_by", "s_up_at"];

}
