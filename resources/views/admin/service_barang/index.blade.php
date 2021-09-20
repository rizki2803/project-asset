@extends('admin.layout.layout')
@section('content')

    <section class="content">
        <div class="container-fluid" >
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <!-- Basic Examples -->
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA SERVICE BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#addsrvc">
                                                <i class="material-icons">add_box</i>Input Data Service
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <form method="get" action="{{url('/srvc_bar')}}">
                                    <div class="col-xs-6">
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <div class="form-line">
                                                <input type="text" readonly id="min" name="min" value="" class="form-control" placeholder="Date start..."/>
                                            </div>
                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="text" readonly id="max" name="max" value="" class="form-control" placeholder="Date end..."/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" id="date_filter" name="date_filter" class="btn btn-xs btn-secondary waves-effect">
                                            <i class="material-icons">search</i>search
                                        </button>
                                        <a href="{{url('/srvc_bar')}}" class="btn btn-xs btn-primary waves-effect">
                                            <i class="material-icons">sync</i>refresh
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ACT</th>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-3">NAMA</th>
                                        <th class="col-sm-2">DEPARTEMENT</th>
                                        <th>LETAK BARANG</th>
                                        <th>STATUS</th>
                                        <th>VENDOR</th>
                                        <th>ESTIMASI</th>
                                        <th class="col-sm-3">KETERANGAN</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ACT</th>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-3">NAMA</th>
                                        <th class="col-sm-2">DEPARTEMENT</th>
                                        <th>LETAK BARANG</th>
                                        <th>STATUS</th>
                                        <th>VENDOR</th>
                                        <th>ESTIMASI</th>
                                        <th class="col-sm-3">KETERANGAN</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($srvc as $service)
                                        <tr>
                                                <td>
                                                    <a onclick="edit('{{$service->s_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addsrvc">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a onclick="del('{{$service->s_id}}')" class="btn btn-danger btn-xs waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </td>
                                            <td>
                                                {{$service->p_reg}}
                                            </td>
                                            <td>
                                                {{strtoupper($service->p_nmusr)}}
                                            </td>
                                            <td>
                                                {{strtoupper($service->p_dprt)}}
                                            </td>
                                            <td>
                                                @if($service->s_pick == 0)
                                                    KARYAWAN
                                                @elseif($service->s_pick == 1)
                                                    VENDOR
                                                @else
                                                    DEPARTEMEN IT
                                                @endif
                                            </td>
                                            <td>
                                                @if($service->s_stat == 0)
                                                    ON PROCESS
                                                @else
                                                    FINISH
                                                @endif
                                            </td>
                                            <td>
                                                {{$service->s_vndr}}
                                            </td>
                                            <td>
                                                @if($service->s_estmd <= now())
                                                    @if($service->s_stat == 0)
                                                        <i onload="stat()">Waktu Habis</i>
                                                    @else
                                                        <i>Waktu Habis</i>
                                                    @endif
                                                @elseif(date('d-m-Y', strtotime($service->s_estmd)) == date('d-m-Y', strtotime(now())))
                                                    @php
                                                        $awal  = date_create();
                                                        if(isset($service)){
                                                            $akhir = date_create($service->s_estmd);
                                                            }
                                                        $diff  = date_diff( $akhir, $awal );
                                                        echo 'Waktu tinggal : ' . $diff->h .  ' jam, ' . $diff->i . ' menit' ;
                                                    @endphp
                                                @else
                                                    @php
                                                        if(isset($service)){
                                                            echo date('d-m-Y', strtotime($service->s_estmd));
                                                            }
                                                    @endphp
                                                @endif
                                            </td>
                                            <td>
                                                {{strtoupper($service->p_desk)}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END-->

            <!-- ADD SERVICE BARANG -->
            <div class="modal fade" id="addsrvc" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('admin.service_barang.form')
                    </div>
                </div>
            </div>

            <script>

                function isi_otomatis(){
                    var reg = $("#reg").val();
                    var urlGet = "{{route('isi_srvc','iniuuidservice')}}";
                    urlGet = urlGet.replace('iniuuidservice',reg);
                    $.get(urlGet, function(data){
                        $("#nmusr").val(data.srvc.p_nmusr);
                        $("#dprt").val(data.srvc.p_dprt);
                        $("#ket").val(data.srvc.p_desk);
                    });
                }

                $(document).ready(function(){

                    var minDate, maxDate;

                    // Refilter the table
                    $('#min, #max').on('change', function () {
                        // Create date inputs
                        minDate = new DateTime($('#min'), {
                            format: 'MM/DD/YYYY'
                        });
                        maxDate = new DateTime($('#max'), {
                            format: 'MM/DD/YYYY'
                        });

                    });

                    var estMaxDate;

                    // Refilter the table
                    $('#estMax').on('change', function () {
                        // Create date inputs
                        estMaxDate = new DateTime($('#estMax'), {
                            format: 'MM/DD/YYYY'
                        });

                    });

                });

                function crt() {
                    var url = "{{route('store_srvc')}}"
                    $("#reg").attr('disabled', false).val("");
                    $("#nmusr").attr('disabled', false).val("");
                    $("#dprt").attr('disabled', false).val("");
                    $("#ket").attr('disabled', false).val("");
                    $("#vndr").val("");
                    $("#pss").val("");
                    $("#estMax").val("");
                    $("#form-srvc").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_srvc','iniuuidservice')}}";
                    urlGet = urlGet.replace('iniuuidservice',id);

                    var urlPost = "{{route('upd_srvc','iniuuidservice')}}";
                    urlPost = urlPost.replace('iniuuidservice',id);

                    $.get(urlGet, function(data){
                        $("#reg").attr('disabled', true).val(data.srvc.p_reg);
                        $("#nmusr").attr('disabled', true).val(data.srvc.p_nmusr);
                        $("#dprt").attr('disabled', true).val(data.srvc.p_dprt);
                        $("#ket").attr('disabled', true).val(data.srvc.p_desk);
                        $("#vndr").val(data.srvc.s_vndr);
                        $("#pick").val(data.srvc.s_pick);
                        $('#estMax').val(moment(data.srvc.s_estmd).format('MM/DD/YYYY'));
                    });

                    $("#form-srvc").attr("action", urlPost);

                }

                function del(id) {
                    var url = "{{route('del_srvc','iniuuidservice')}}";
                    url = url.replace('iniuuidservice',id);

                    swal({
                        title: "Apakah Anda Akan Menghapus Data Ini?",
                        text: "Data Yang Dihapus Tidak Akan Bisa Kembali!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false
                    }, function () {
                        swal("Deleted!", "Data Berhasil di Hapus.", "success");
                        window.location.href = url;
                    });
                }

                function stat(){

                }
            </script>

        </div>
    </section>

@endsection
