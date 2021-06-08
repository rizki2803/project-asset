<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "srvc";

    protected $fillable = ["s_id", "p_id", "s_pick", "s_stat", "s_vndr"];

}
