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
                                DATA STOK BARANG KELUAR
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#addoutput">
                                                <i class="material-icons">add_box</i>Input Data Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <form method="get" action="{{url('/out_bar')}}">
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
                                        <a href="{{url('/out_bar')}}" class="btn btn-xs btn-primary waves-effect">
                                            <i class="material-icons">sync</i>refresh
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>NO REG</th>
                                        <th>TGL KELUAR</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>JML</th>
                                        <th>SATUAN</th>
                                        <th>PEMBERI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>NO REG</th>
                                        <th>TGL KELUAR</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>JML</th>
                                        <th>SATUAN</th>
                                        <th>PEMBERI</th>
                                        <th>KETERANGAN</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php
                                        $no=1;
                                    @endphp

                                    @foreach($out as $output)
                                        <tr>
                                            <td>
                                                {{$no++}}
                                            </td>
                                            @if ($output->out_cr_at >= now())
                                                <td>
                                                    <a onclick="edit('{{$output->out_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addoutput">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a onclick="del('{{$output->out_id}}')" class="btn btn-danger btn-xs waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a onclick="edit('{{$output->out_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addoutput">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                {{$output->p_reg}}
                                            </td>
                                            <td>
                                                {{$output->out_tgl}}
                                            </td>
                                            <td>
                                                {{$output->mb_kode}}
                                            </td>
                                            <td>
                                                {{$output->mb_nmbar}}
                                            </td>
                                            <td>
                                                {{$output->out_jml}}
                                            </td>
                                            <td>
                                                {{$output->sb_nm}}
                                            </td>
                                            <td>
                                                {{$output->out_pjwb}}
                                            </td>
                                            <td>
                                                {{$output->out_ket}}
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

            <!-- ADD OUTPUT BARANG -->
            <div class="modal fade" id="addoutput" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('admin.output_barang.form')
                    </div>
                </div>
            </div>

            <script>

                function isi_otomatis(){
                    var reg = $("#reg").val();
                    var urlGet = "{{route('isi_in','iniuuidinput')}}";
                    urlGet = urlGet.replace('iniuuidinput',reg);
                    $.get(urlGet, function(data){
                        $("#nmusr").val(data.in.p_nmusr);
                        $("#dprt").val(data.in.p_dprt);
                    });
                }

                function crt() {
                    var url = "{{route('store_out')}}"
                    $("#reg").attr('disabled', false).val("");
                    $("#nmusr").attr('disabled', false).val("");
                    $("#dprt").attr('disabled', false).val("");
                    $("#nmbarang").attr('disabled', false).val("");
                    $("#jml").attr('disabled', false).val("");
                    $("#ket").val("");
                    $("#pjwb").val("");
                    $("#form-out").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_out','iniuuidoutput')}}";
                    urlGet = urlGet.replace('iniuuidoutput',id);

                    var urlPost = "{{route('upd_out','iniuuidoutput')}}";
                    urlPost = urlPost.replace('iniuuidoutput',id);

                    $.get(urlGet, function(data){
                        $("#reg").attr('disabled', true).val(data.out.p_reg);
                        $("#nmusr").attr('disabled', true).val(data.out.p_nmusr);
                        $("#dprt").attr('disabled', true).val(data.out.p_dprt);
                        $("#nmbarang").attr('disabled', true).val(data.out.mb_nmbar);
                        $("#jml").attr('disabled', true).val(data.out.out_jml);
                        $("#ket").val(data.out.out_ket);
                        $("#pjwb").val(data.out.out_pjwb);
                    });

                    $("#form-out").attr("action", urlPost);

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

                });

                function del(id) {
                    var url = "{{route('del_out','iniuuidoutput')}}";
                    url = url.replace('iniuuidoutput',id);

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
            </script>

        </div>
    </section>

@endsection
