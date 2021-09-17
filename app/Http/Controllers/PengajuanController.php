<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Pengajuan;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    public function list_p()
    {


        return view('admin.list_pengajuan.index');
    }

    public function index()
        {
            $data ['mb'] = Master::pluck('mb_nmbar', 'mb_nmbar');

            return view('user.index', $data);
        }

    public function store_p(Request $request)
        {
        //--Pembuatan KODE
            $p_kat = ($request->pengajuan == "P") ? 0 : 1;

            $p_katKode = ($p_kat == "0") ? "PB" : "KB";

            $desc_p_kat = Pengajuan::orderBy('p_cr_at','DESC')->where('p_kat', $p_kat)->first();

            if($desc_p_kat != null)
            {
                (int)$latesKode = substr($desc_p_kat->p_reg,4,4);
                $newKode = str_pad( $latesKode+1, 4, "0", STR_PAD_LEFT );
            }

            $kodeAngka = $desc_p_kat == null ? "0001" : $newKode;

            $kodeTahun = Carbon::now()->format('Y');
            $conv_kodeTahun = substr($kodeTahun,2,2);

            $kode = $p_katKode.$conv_kodeTahun.$kodeAngka;
        //--END-Pembuatan KODE

            //$mb = Master::select('*')->where('mb_nmbar', $request->jenisbarang)->first();

            $store = [
                'p_id' => Uuid::uuid4(),
                'p_kat' => $p_kat,
                'p_reg' => $kode,
                'p_nmusr' => $request->nmusr,
                'p_dprt' => $request->dprt,
                'p_email' => $request->email,
                'p_atsn' => $request->atsn,
                'p_asst' => $request->asst,
                'p_merk' => $request->merk,
                //'mb_id' => $mb->mb_id,
                'p_desk' => $request->desk,
                'p_tgl' => Carbon::now()->setTimezone('asia/jakarta'),
                'p_cr_at' => now(),

            ];

            Pengajuan::select('*')->insert($store);

            return back();
        }

}
