<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Output;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class OutputController extends Controller
{

    public function index(Request $request)
        {
            if(($request->has('min')) && ($request->has('max'))) {
                $data ['out']= Output::select('*')
                    ->join('master_bar', 'master_bar.mb_id','=', 'out_bar.mb_id')
                    ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
                    ->join('bar_p', 'bar_p.p_id','=', 'out_bar.p_id')
                    ->wherebetween('out_tgl',[$request->min.' 00:00:00', $request->max.' 23:59:59'])
                    ->get();
                //dd($request->min, $request->max);
            }
            else {
                //dd($request->date_filter);
                $data ['out']= Output::select('*')
                    ->join('master_bar', 'master_bar.mb_id','=', 'out_bar.mb_id')
                    ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
                    ->join('bar_p', 'bar_p.p_id','=', 'out_bar.p_id')
                    ->get();
            }

            /*$data ['out']= Output::select('*')
                ->join('master_bar', 'master_bar.mb_id','=', 'out_bar.mb_id')
                ->join('sat_bar', 'sat_bar.sb_id','=', 'master_bar.sb_id')
                ->join('bar_p', 'bar_p.p_id','=', 'out_bar.p_id')
                ->get();
//            dd($data);
*/
        $data ['mb'] = Master::pluck('mb_nmbar', 'mb_nmbar');

        $data ['bp'] = Pengajuan::pluck('p_reg', 'p_reg');

            return view('admin.output_barang.index',$data);
        }

    public function store_out(Request $request)
    {
        $mb = Master::select('*')->where('mb_nmbar', $request->nmbarang)->first();

        $bp = Pengajuan::select('*')->where('p_reg', $request->reg)->first();

        $srvc = null;

        (int)$stok = $mb->mb_jml;

        $stokUpd = $stok - $request->jml;

        $storeStok = [
            'mb_jml' => $stokUpd,
            'mb_up_by' => $request->pjwb,
            'mb_up_at' => now()

        ];

        $store = [
            'out_id' => Uuid::uuid4(),
            'out_tgl' => Carbon::now()->isoFormat('D MMMM Y'),
            'mb_id' => $mb->mb_id,
            'out_pjwb' => strtoupper($request->pjwb),
            'out_ket' => strtoupper($request->ket),
            'out_jml' => $request->jml,
            'p_id' => $bp->p_id,
            's_id' => $srvc,
            'out_cr_by' => strtoupper($request->pjwb),
            'out_cr_at' => now()

        ];

        Output::select('*')->insert($store);

        Master::select('*')->where('mb_id', $mb->mb_id)->update($storeStok);

        return redirect()->back();

    }

    public function del_out($id)
    {
        $out = Output::select('*')->where('out_id', $id)->first();

        $mb = Master::select('*')->where('mb_id', $out->mb_id)->first();

        (int)$stokOut = $out->out_jml;

        (int)$stok = $mb->mb_jml;

        $stokUpd = $stok + $stokOut;

        $storeStok = [
            'mb_jml' => $stokUpd,
            'mb_up_by' => $out->out_pjwb,
            'mb_up_at' => now()

        ];

        Master::select('*')->where('mb_id', $mb->mb_id)->update($storeStok);

        Output::select('*')->where('out_id', $id)->delete();

        return redirect()->back();
    }

    public function edit_out($id)
    {
        $dataEdit ['out']= Output::select('*')
            ->join('master_bar', 'master_bar.mb_id','=', 'out_bar.mb_id')
            ->join('bar_p', 'bar_p.p_id','=', 'out_bar.p_id')
            ->where('out_id', $id)->first();

        return $dataEdit;
    }

    public function upd_out(Request $request, $id)
    {
        $store = [
            'out_ket' => strtoupper($request->ket),
            'out_pjwb' => strtoupper($request->pjwb),
            'out_up_by' => strtoupper($request->pjwb),
            'out_up_at' => now()

        ];

        Output::select('*')->where('out_id', $id)->update($store);

        return redirect()->back();

    }

    public function isi_out($reg)
    {
        $dataIsi ['out']= Pengajuan::select('*')->where('p_reg', $reg)->first();
        //dd($data);

        return $dataIsi;
    }

}
