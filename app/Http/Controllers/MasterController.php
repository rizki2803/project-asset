<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

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

//------------------------------KATEGORI BARANG----------------------------------------------

    public function kat_bar()
    {
        $data['kt'] = KategoriBarang::select('*')->get();

        return view('admin.master_barang.kat_bar.index', $data);
    }

    public function store_kt(Request $request)
    {
        $kt_nm_conv = strtoupper($request->kt_nm);
        $kt_kode_conv = strtoupper($request->kt_kode);

        $store = [
            'kt_id' => Uuid::uuid4(),
            'kt_kode' => $kt_kode_conv,
            'kt_nm' => $kt_nm_conv,
        ];

        KategoriBarang::select('*')->insert($store);
        return redirect()->back();
    }

    public function del_kt($id)
    {
        KategoriBarang::select('*')->where('kt_id', $id)->delete();

        return redirect()->back();
    }

    public function edit_kt($id)
    {
        $tipe ['kt'] = KategoriBarang::select('*')->where('kt_id', $id)->first();

        return $tipe;
    }

    public function upd_kt(Request $request, $id)
    {
        $kt_nm_conv = strtoupper($request->kt_nm);
        $kt_kode_conv = strtoupper($request->kt_kode);

        $store = [
            'kt_kode' => $kt_kode_conv,
            'kt_nm' => $kt_nm_conv,
        ];

        KategoriBarang::select('*')->where('kt_id', $id)->update($store);
        return redirect()->route('kat_bar');

    }

//END------------------------------KATEGORI BARANG----------------------------------------------

//------------------------------SATUAN BARANG----------------------------------------------

    public function sat_bar()
    {
        $data['sb'] = SatuanBarang::select('*')->get();

        return view('admin.master_barang.sat_bar.index', $data);
    }

    public function store_sb(Request $request)
    {
        $sb_nm_conv = strtoupper($request->sb_nm);

        $store = [
            'sb_id' => Uuid::uuid4(),
            'sb_nm' => $sb_nm_conv,
        ];

        SatuanBarang::select('*')->insert($store);
        return redirect()->back();
    }

    public function del_sb($id)
    {
        SatuanBarang::select('*')->where('sb_id', $id)->delete();

        return redirect()->back();
    }

    public function edit_sb($id)
    {
        $tipe ['sb'] = SatuanBarang::select('*')->where('sb_id', $id)->first();

        return $tipe;
    }

    public function upd_sb(Request $request, $id)
    {
        $sb_nm_conv = strtoupper($request->sb_nm);

        $store = [

            'sb_nm' => $sb_nm_conv,
        ];

        SatuanBarang::select('*')->where('sb_id', $id)->update($store);
        return redirect()->route('sat_bar');

    }

//END------------------------------SATUAN BARANG----------------------------------------------

}
