<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Models\Master;
use App\Models\Pengajuan;
use App\Models\SatuanBarang;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{

    public function index()
        {
            return view('admin.index');
        }

//------------------------------MASTER BARANG----------------------------------------------

    public function mstr_bar()
    {

        $data ['mb']= Master::select('*')
                        ->join('kat_bar', 'kat_bar.kt_id','=', 'master_bar.kt_id')
                        ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
                        ->get();

        $data ['kt'] = KategoriBarang::pluck('kt_nm', 'kt_nm');

        $data ['sb'] = SatuanBarang::pluck('sb_nm', 'sb_nm');

        //dd($data);

        return view('admin.master_barang.index', $data);
    }

    public function store_mb(Request $request)
    {

        $kt = KategoriBarang::select('*')->where('kt_nm', $request->kategori)->first();

        $master = Master::orderBy('mb_cr_at','DESC')->where('kt_id', $kt->kt_id)->first();

        $sb = SatuanBarang::select('*')->where('sb_nm', $request->satuan)->first();

        if($master != null)
        {
            (int)$latesKode = substr($master->mb_kode,5,5);
            $newKode = str_pad( $latesKode+1, 4, "0", STR_PAD_LEFT );
        }

        $kodeAngka = $master == null ? "0001" : $newKode;
        $kode = "IT-".$kt->kt_kode."-".$kodeAngka;

        $mb_nmbar_conv = strtoupper($request->mb_nmbar);

        $store = [
            'mb_id' => Uuid::uuid4(),
            'mb_kode' => $kode,
            'kt_id' => $kt->kt_id,
            'sb_id' => $sb->sb_id,
            'mb_nmbar' => $mb_nmbar_conv,
            'mb_minjml' => $request->mb_minjml,
            'mb_cr_at' => now()

        ];

        Master::select('*')->insert($store);

        return redirect()->back()->with('success', 'Update Successfully...');
    }

    public function del_mb($id)
    {
        Master::select('*')->where('mb_id', $id)->delete();

        return redirect()->back();
    }

    public function edit_mb($id)
    {
        $master ['mb']= Master::select('*')
            ->join('kat_bar', 'kat_bar.kt_id','=', 'master_bar.kt_id')
            ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
            ->where('mb_id', $id)->first();

        return $master;
    }

    public function upd_mb(Request $request, $id)
    {
        $sb = SatuanBarang::select('*')->where('sb_nm', $request->satuan)->first();

        $mb_nmbar_conv = strtoupper($request->mb_nmbar);

        $store = [
            'sb_id' => $sb->sb_id,
            'mb_nmbar' => $mb_nmbar_conv,
            'mb_minjml' => $request->mb_minjml,
            'mb_up_at' => now()

        ];

        Master::select('*')->where('mb_id', $id)->update($store);

        return redirect()->back()->with('warning','Update Successfully!!!');

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
            'kt_cr_at' => now()
        ];

        KategoriBarang::select('*')->insert($store);
        return redirect()->back()->with('success', 'Update Successfully...');
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
            'kt_up_at' => now()
        ];

        KategoriBarang::select('*')->where('kt_id', $id)->update($store);
        return redirect()->route('kat_bar')->with('warning','Update Successfully!!!');

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
            'sb_cr_at' => now()
        ];

        SatuanBarang::select('*')->insert($store);
        return redirect()->back()->with('success', 'Update Successfully...');
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
            'sb_up_at' => now()
        ];

        SatuanBarang::select('*')->where('sb_id', $id)->update($store);
        return redirect()->route('sat_bar')->with('warning','Update Successfully!!!');

    }

//END------------------------------SATUAN BARANG----------------------------------------------
//------------------------------SERVICE BARANG----------------------------------------------

    public function srvc_bar()
    {
        $data ['srvc']= Service::select('*')
            ->join('bar_p', 'bar_p.p_id','=', 'srvc.p_id')
            ->get();

        $data ['bp'] = Pengajuan::select('*')
            ->where('p_kat', '1')
            ->pluck('p_reg', 'p_reg');
        //dd($data);

        return view('admin.service_barang.index',$data);
    }

    public function isi_srvc($reg)
    {
        $dataIsi ['srvc']= Pengajuan::select('*')->where('p_reg', $reg)->first();
        //dd($data);

        return $dataIsi;
    }

    public function store_srvc(Request $request)
    {
        $bp = Pengajuan::select('*')->where('p_reg', $request->reg)->first();

        $nmLogin = Auth::user()->name;
        //dd($akun);

        $store = [
            's_id' => Uuid::uuid4(),
            'p_id' => $bp->p_id,
            's_stat' => '0',
            's_pick' => strtoupper($request->pss),
            's_vndr' => strtoupper($request->vndr),
            's_estmd' => $request->estMax.' 23:59:59',
            's_cr_by' => strtoupper($nmLogin),
            's_cr_at' => now()

        ];

        Service::select('*')->insert($store);

        return redirect()->back()->with('success', 'Update Successfully...');

    }

//END------------------------------SERVICE BARANG----------------------------------------------
}
