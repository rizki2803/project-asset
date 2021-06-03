<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bar_p extends Model
{
    use HasFactory;

    protected $table = "bar_p";

    protected $fillable = ["p_id", "p_stat", "p_reg", "p_nmusr", "p_dprt", "p_atsn", "p_email",
                            "p_asst", "p_merk", "p_desk", "p_pmrks", "p_approv"];

}
