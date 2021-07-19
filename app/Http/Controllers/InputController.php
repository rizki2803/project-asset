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
            'in_asst' => $request->asst,
            'in_tgl' => Carbon::now()->isoFormat('D MMMM Y'),
            'in_vndr' => $request->vndr,
            'mb_id' => $mb->mb_id,
            'in_pjwb' => $request->pjwb,
            'in_ket' => $request->ket,
            'in_jml' => $request->jml,
            'p_id' => $bp->p_id,
            's_id' => $srvc,
            'in_cr_by' => $request->pjwb,
            'in_cr_at' => now()

        ];

        Input::select('*')->insert($store);

        Master::select('*')->where('mb_id', $mb->mb_id)->update($storeStok);

        return redirect()->back();

    }


}
