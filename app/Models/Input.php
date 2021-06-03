<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $table = "in_bar";

    protected $fillable = ["in_id", "in_asst", "in_tgl", "in_vndr", "mb_id", "in_pjwb", "in_ket"];

}