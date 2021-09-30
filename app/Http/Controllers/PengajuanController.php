<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\Master;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Notification;
use App\Notifications\TesNotif;
use App\Notifications\user\AtasanNotification;
use App\Notifications\user\AtasanSeq1Notification;
use App\Notifications\user\AtasanSeq2Notification;
use App\Notifications\AdminNotification;
use App\Notifications\user\UserNotification;
use App\Models\test_api;
use Illuminate\Support\Str;


class PengajuanController extends Controller
{
    public function list_p()
    {
        $data['mb']= pengajuan::select('*')
            ->rightjoin('aprv', 'aprv.p_id','=', 'bar_p.p_id')
//            ->distinct('aprv.a_seq')

            ->get();

        $status = [];
        $status[0] = "Proccess";
        $status[1] = "Approve";
        $status[2] = "No Approve";
        $status[3] = "RollBack";
        $status[4] = "Hold";
        $status[5] = "Cancel";

//dd($data['mb']);
        return view('admin.list_pengajuan.index', ['mb' => $data['mb'], 'status' => $status]);
    }

    public function index()
        {
            //$data ['mb'] = Master::pluck('mb_nmbar', 'mb_nmbar');

            return view('user.index',);
        }

    public function store_p(Request $request)
        {
//-------------------------------------------Pembuatan KODE-------------------------------------------------------------

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

//------------------------------------------END-Pembuatan KODE---------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------
//            $mb = Master::select('*')->where('mb_nmbar', $request->jenisbarang)->first();

            $store = [
                'p_id' => Uuid::uuid4(),
                'p_kat' => $p_kat,
                'p_reg' => $kode,
                'p_nik' => $request->nik,
                'p_nmusr' => $request->nmusr,
                'p_dprt' => $request->dprt,
                'p_email' => $request->email,
                'p_atsn' => $request->atsn,
                'p_asst' => $request->asst,
                'p_merk' => $request->merk,
//                'mb_id' => $mb->mb_id,
                'p_pmrks' => $request->pmrks,
                'p_desk' => $request->desk,
                'p_tgl' => Carbon::now()->setTimezone('asia/jakarta'),
                'p_cr_at' => now(),
                'p_token' => Str::random(10)

            ];

            $storeData = Pengajuan::select('*')->insert($store);

            if ($storeData){

                $emailAtasan = "rizkioi.rm@gmail.com";
                

                $data = [];
                $data['p_atsn'] = $store['p_atsn'];
                $data['p_nmusr'] = $store['p_nmusr'];
                $data['p_email'] = $store['p_email'];
                $data['p_reg'] = $store['p_reg'];
                $data['p_desk'] = $store['p_desk'];
                $data['subject'] = 'Pengajuan Barang';
                $data['p_merk'] = $store['p_merk'];
                $data['p_token'] = $store['p_token'];

                //Send Email Pegawai (User)
                $sendEmailPegawai = Notification::route('mail', $data['p_email'])->notify(new UserNotification($data));
                // Send Email ke Atasan (input)
                $sendEmailAtasan = Notification::route('mail', $emailAtasan)->notify(new AtasanNotification($data));


                $p = pengajuan::select('*')
                    ->where('p_reg', '=', $data['p_reg'])
                    ->first();

                $storeApprv = [
                    'a_id' => Uuid::uuid4(),
                    'a_seq' => 0,
                    'a_stat' => 0,
                    'a_nm' => $p->p_atsn,
                    'a_nik' => $p->p_nik,
                    'p_id' => $p->p_id,
                    'a_cur_p' => true,
                    'a_cr_by' => $p->p_nmusr,
                    'a_cr_at' => Carbon::now()->setTimezone('asia/jakarta'),
                ];
                try {
                    Approve::select('*')->insert($storeApprv);
                }catch (\Exception $e){
                    return 'error';
                }

            }

            return back();
        }

        public function detailKodeRegistrasi(Request $request, $kodeRegis)
        {
            try {
//               $data['mb']= pengajuan::select('*')
//                  // ->join('master_bar', 'master_bar.mb_id','=', 'bar_p.mb_id')
//                   ->where('bar_p.p_reg', '=', $request->kode_regis)
//                   ->get();
                $data = Approve::rightjoin('bar_p', 'bar_p.p_id', '=', 'aprv.p_id')
                                ->rightjoin('in_bar', 'in_bar.p_id', '=', 'aprv.p_id')
                            //    ->rightjoin('srvc', 'srvc.p_id', '=', 'aprv.p_id')
                                ->where('bar_p.p_reg', $kodeRegis)
                                ->orderBy('a_seq', 'DESC')
                                ->first();
                $status = [];
                $status[0] = "Proccess";
                $status[1] = "Approve";
                $status[2] = "No Approve";
                $status[3] = "RollBack";
                $status[4] = "Hold";
                $status[5] = "Cancel";

                if (!empty($data)){

                    $data["letak"] = false;

                    return [
                        'data' => $data,
                        'status' => $status,
                        'p_reg' => $kodeRegis
                    ];
//                    return view('user.detail_kode_reg', [
//                        'data' => $data,
//                        'status' => $status,
//                        'p_reg' => $request->kode_regis
//                    ]);
                }else{
                    $service = Service::join('bar_p', 'bar_p.p_id','=', 'srvc.p_id')
                                ->join('aprv', 'bar_p.p_id','=', 'aprv.p_id')
                                ->where('bar_p.p_reg', "=",$kodeRegis)
                                ->orderBy('aprv.a_cr_at', 'DESC')
                                ->first();
                    
                    $service_a_nm = $service->a_nm;

                    if (!empty($service)) {

                        $bar_p = Pengajuan::where('p_reg', $kodeRegis)->first();

                        $aprv = approve::where('p_id', $bar_p->p_id)->first();

                        // dd($aprv);

                        if ($service->s_pick == 0) {
                            $letak = "Karyawan";
                        }elseif($service->s_pick == 1){
                            $letak = "Vendor";
                        }else{
                            $letak = "DEPARTEMEN IT";
                        }

                        $service['a_nik'] = $service->p_nik;
                        $service['a_nm'] = $service->p_nmusr;
                        $service['p_asst'] = $service->p_asst;
                        $service['in_ket'] = $service->p_desk;
                        $service['in_pjwb'] = $letak;
                        $service["letak"] = true;
                        $service['a_stat'] = ($aprv->a_stat == 2?"Pengajuan dibatalkan, karena ".$bar_p->p_alasan.".":($service->s_stat==false?"On Process " .ucwords($service_a_nm) :"Sudah di ACC "));
                        // dd($service->s_stat);
                        return ["data" => $service];
                    }
                    return ['data' => 0];
                }
                }catch(\Exception $e){
                    return $e->getMessage();
                    return abort('500');
                }
        }


        public function notiftes(Request $request)
        {
            $data = [];
            $data['nama'] = "Lindung";
            $sendEmail = Notification::route('mail', 'rizkioi.rm@gmail.com')->notify(new TesNotif($data));

            return [];
        }


        public function getDataPegawai($nik)
        {
            $tes_api = test_api::where('a_nik', $nik)->first();
            return !is_null($tes_api) ? $tes_api : ['message' => 'Data Tidak ada !'];
        }


        public function approve(Request $request, $kode_reg, $p_token)
        {
            $data= pengajuan::select('*')
                                    ->where([
                                        ['p_reg', '=', $kode_reg],
                                        ['p_token', '=', $p_token]
                                    ])
                                    ->first();

//            dd($data);

            $store = [
                'a_id' => Uuid::uuid4(),
                'a_seq' => 0,
                'a_stat' => 1,
                'a_cur_p' => true,
                'a_up_by' => $data->p_atsn,
                'a_nik' => $data->nik,
                'a_up_at' => Carbon::now()->setTimezone('asia/jakarta')
            ];
            try {
                Approve::where('p_id', '=', $data['p_id'])->update($store);

                $storeApprove2 = [
                    'a_id' => Uuid::uuid4(),
                    'a_seq' => 1,
                    'a_nm' => 'Teguh',
                    'a_nik' => $data->nik,
                    'p_id' => $data['p_id'],
                    'a_stat' => 0,
                    'a_cur_p' => false,
                    'a_cr_by' => $data->p_atsn,
                    'a_cr_at' => Carbon::now()->setTimezone('asia/jakarta')
                ];

                $getAprrove = Approve::where('p_id', '=', $data['p_id'])->first();
                Approve::select('*')->insert($storeApprove2);
                

                // send Email ke pa teguh
                $sendEmailAtasan = Notification::route('mail', env('EMAIL_ATASAN1'))->notify(new AtasanSeq1Notification($data));
                return view ('user.viewapprove');

            }catch (\Exception $e){
                return 'error <br>'.$e->getMessage();
            }


//            return $data;
//dd($data);
//        return view('admin.list_pengajuan.index',$data);
        }

    public function approveseq1(Request $request, $kode_reg,$p_token)
    {
        $data= pengajuan::select('*')
            ->join('aprv', 'aprv.p_id', '=', 'bar_p.p_id')
            ->where([
                ['p_reg', '=', $kode_reg],
                ['p_token', '=', $p_token],
                ['aprv.a_seq', '=', 1]
            ])
            ->first();

        $store = [
            'a_id' => Uuid::uuid4(),
            'a_seq' => 0,
            'a_stat' => 1,
            'a_cur_p' => false,
            'a_nik' => $data->nik,
//            'a_up_by' => 'Teguh',
            'a_up_at' => Carbon::now()->setTimezone('asia/jakarta')
        ];

        $storeSeq1 = [
            'a_id' => Uuid::uuid4(),
            'a_seq' => 1,
            'a_stat' => 1,
            'a_cur_p' => true,
            'a_nik' => $data->nik,
            'a_up_by' => 'Teguh',
            'a_up_at' => Carbon::now()->setTimezone('asia/jakarta')
        ];

        try {
            Approve::where([
                ['p_id', '=', $data['p_id']],
                ['a_seq', '=', 0]
            ])->update($store);
            Approve::where([
                ['p_id', '=', $data['p_id']],
                ['a_seq', '=', 1]
            ])->update($storeSeq1);

            $storeApprove3 = [
                'a_id' => Uuid::uuid4(),
                'a_seq' => 2,
                'a_nm' => 'Fadli',
                'a_nik' => $data->nik,
                'p_id' => $data['p_id'],
                'a_stat' => 0,
                'a_cur_p' => false,
                'a_cr_by' => 'Teguh',
                'a_cr_at' => Carbon::now()->setTimezone('asia/jakarta')
            ];

            $getAprrove = Approve::where('p_id', '=', $data['p_id'])->first();
            Approve::select('*')->insert($storeApprove3);

    

            // send Email ke pa Fadly
            $sendEmailAtasan = Notification::route('mail', env('EMAIL_ATASAN2'))->notify(new AtasanSeq2Notification($data));

            return view ('user.viewapprove');

        }catch (\Exception $e){
            return 'error <br>'.$e->getMessage();
        }
//            return $data;
//dd($data);
//        return view('admin.list_pengajuan.index',$data);
    }

    public function approveseq2(Request $request, $kode_reg,$p_token)
    {
        $data= pengajuan::select('*')
            ->join('aprv', 'aprv.p_id', '=', 'bar_p.p_id')
            ->where([
                ['p_reg', '=', $kode_reg],
                ['p_token', '=', $p_token],
                ['aprv.a_seq', '=', 2]
            ])
            ->firstOrFail();

        $store = [
            'a_id' => Uuid::uuid4(),
            'a_seq' => 1,
            'a_stat' => 1,
            'a_nik' => $data->nik,
            'a_cur_p' => false,
            'a_up_at' => Carbon::now()->setTimezone('asia/jakarta')
        ];

        $storeSeq2 = [
            'a_id' => Uuid::uuid4(),
            'a_seq' => 2,
            'a_stat' => 1,
            'a_nik' => $data->nik,
            'a_cur_p' => true,
            'a_up_by' => 'Fadly',
            'a_up_at' => Carbon::now()->setTimezone('asia/jakarta')
        ];

        try {
            Approve::where([
                ['p_id', '=', $data['p_id']],
                ['a_seq', '=', 1]
            ])->update($store);
            Approve::where([
                ['p_id', '=', $data['p_id']],
                ['a_seq', '=', 2]
            ])->update($storeSeq2);

            

            // send Email ke pa Fadly
            $sendEmailAtasan = Notification::route('mail',env('EMAIL_ATASAN2'))->notify(new AtasanSeq2Notification($data));
            $emailadmin = "rizkioi.rm@gmail.com";

            // send Email ke admin
            $sendEmailadmin = Notification::route('mail', $emailadmin)->notify(new AdminNotification($data));
            
            $pid = Pengajuan::where('p_reg', '=', $kode_reg)->first()->p_id;
            
            $srvc = Service::where('p_id', $pid);
            if(!empty($srvc->first())){
                $srvc->update([ 's_stat' => true ]);
            }

            return view ('user.viewapprove');
        }catch (\Exception $e){
            return abort('500');
            // return 'error <br>'.$e->getMessage();
        }


//            return $data;
//dd($data);
//        return view('admin.list_pengajuan.index',$data);
    }

    public function reject($kode_reg, $p_token) {
        return view('user.reject',[
            'kd_reg' => $kode_reg,
            'token' => $p_token
        ]);
    }
    public function StoreReject(Request $request, $kode_reg, $p_token) {
        $pengajuan = pengajuan::where([
            ['p_reg',$kode_reg],
            ['p_token',$p_token]
        ]);

        $update_pengajuan = $pengajuan->update([
            'p_alasan' => $request->alasan
        ]);

        $update_aprv = Approve::where('p_id', $pengajuan->first()->p_id)->update([
            'a_stat' => 2
        ]);

        if($update_aprv){
            return view ('user.viewnoapprove');
        }else{
            return "gagal";
        }
    }

}
