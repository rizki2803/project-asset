<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{

    public function index()
        {
            return view('admin.index');
        }

//------------------------------MASTER BARANG----------------------------------------------

    public function mstr_bar()
    {
        return view('admin.master_barang.index');
    }

//END------------------------------MASTER BARANG----------------------------------------------

}
