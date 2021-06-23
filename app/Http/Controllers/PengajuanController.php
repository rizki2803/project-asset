<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Pengajuan;
use Carbon\Carbon;

class PengajuanController extends Controller
{

    public function index()
        {
            $data ['mb'] = Master::pluck('mb_nmbar', 'mb_nmbar');

            return view('user.index', $data);
        }

    public function list_p()
    {
        return view('admin.list_pengajuan.index');
    }

    public function store_p(Request $request)
        {
            $store = [
                'p_id' => Uuid::uuid4(),
                'p_stat' => ($request->stat == "Pengadaan") ? 1 : 0,
                'p_reg' => $request->reg,
                'p_nmusr' => $request->nmusr,
                'p_dprt' => $request->dprt,
                'p_atsn' => $request->atsn,
                'p_email' => $request->email,
                'p_asst' => $request->asst,
                'p_merk' => $request->merk,
                'p_desk' => $request->desk,
                'p_pmrks' => $request->pmrks,
                //'p_apprv' => $request->apprv,
                'p_tgl' => Carbon::now()->setTimezone('asia/jakarta'),

            ];

            Pengajuan::select('*')->insert($store);

            return back();
        }

}
