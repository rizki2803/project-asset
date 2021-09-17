<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_api extends Model
{
    use HasFactory;
    protected $table = "test_api";

    protected $fillable = ["a_nik", "a_nmusr", "a_dprt", "a_atsn", "a_email", "a_tgl", "a_act"];
}
