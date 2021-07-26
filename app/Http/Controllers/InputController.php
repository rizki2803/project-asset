<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Master;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class InputController extends Controller
{

    public function index()
        {
            $data ['in']= Input::select('*')
                ->join('master_bar', 'master_bar.mb_id','=', 'in_bar.mb_id')
                ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
                ->join('bar_p', 'bar_p.p_id','=', 'in_bar.p_id')
                ->get();
//            dd($data);

            $data ['mb'] = Master::pluck('mb_nmbar', 'mb_nmbar');

            $data ['bp'] = Pengajuan::pluck('p_reg', 'p_reg');

            return view('admin.input_barang.index', $data);

        }

    public function store_in(Request $request)
    {
        $mb = Master::select('*')->where('mb_nmbar', $request->nmbarang)->first();

        $bp = Pengajuan::select('*')->where('p_reg', $request->reg)->first();

        $srvc = null;

        (int)$stok = $mb->mb_jml;

        if($stok == null)
        {
            (int)$stok = 0 ;
        }

        $stokUpd = $stok + $request->jml;

        $storeStok = [
            'mb_jml' => $stokUpd,
            'mb_up_by' => $request->pjwb,
            'mb_up_at' => now()

        ];

        $store = [
            'in_id' => Uuid::uuid4(),
            'in_asst' => strtoupper($request->asst),
            'in_tgl' => Carbon::now()->isoFormat('D MMMM Y'),
            'in_vndr' => strtoupper($request->vndr),
            'mb_id' => $mb->mb_id,
            'in_pjwb' => strtoupper($request->pjwb),
            'in_ket' => strtoupper($request->ket),
            'in_jml' => $request->jml,
            'p_id' => $bp->p_id,
            's_id' => $srvc,
            'in_cr_by' => strtoupper($request->pjwb),
            'in_cr_at' => now()

        ];

        Input::select('*')->insert($store);

        Master::select('*')->where('mb_id', $mb->mb_id)->update($storeStok);

        return redirect()->back();

    }

    public function del_in($id)
    {
        $in = Input::select('*')->where('in_id', $id)->first();

        $mb = Master::select('*')->where('mb_id', $in->mb_id)->first();

        (int)$stokIn = $in->in_jml;

        (int)$stok = $mb->mb_jml;

        $stokUpd = $stok - $stokIn;

        $storeStok = [
            'mb_jml' => $stokUpd,
            'mb_up_by' => $in->in_pjwb,
            'mb_up_at' => now()

        ];

        Master::select('*')->where('mb_id', $mb->mb_id)->update($storeStok);

        Input::select('*')->where('in_id', $id)->delete();

        return redirect()->back();
    }

    public function edit_in($id)
    {
        $dataEdit ['in']= Input::select('*')
            ->join('master_bar', 'master_bar.mb_id','=', 'in_bar.mb_id')
            ->join('bar_p', 'bar_p.p_id','=', 'in_bar.p_id')
            ->where('in_id', $id)->first();

        return $dataEdit;
    }

    public function upd_in(Request $request, $id)
    {
        $store = [
            'in_asst' => strtoupper($request->asst),
            'in_vndr' => strtoupper($request->vndr),
            'in_ket' => strtoupper($request->ket),
            'in_pjwb' => strtoupper($request->pjwb),
            'in_up_by' => strtoupper($request->pjwb),
            'in_up_at' => now()

        ];

        Input::select('*')->where('in_id', $id)->update($store);

        return redirect()->back();

    }

}
