<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutputController extends Controller
{

    public function index()
        {
            return view('admin.output_barang.index');
        }

}
