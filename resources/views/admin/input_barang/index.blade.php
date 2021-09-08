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
                                DATA STOK BARANG MASUK
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#addinput">
                                                <i class="material-icons">add_box</i>Input Data Masuk
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <form method="get" action="{{url('/in_bar')}}">
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
                                        <a href="{{url('/in_bar')}}" class="btn btn-xs btn-primary waves-effect">
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
                                        <th>ASSET</th>
                                        <th>TGL TERIMA</th>
                                        <th>VENDOR</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>JML</th>
                                        <th>SATUAN</th>
                                        <th>PENERIMA</th>
                                        <th>KETERANGAN</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>NO REG</th>
                                        <th>ASSET</th>
                                        <th>TGL TERIMA</th>
                                        <th>VENDOR</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>JML</th>
                                        <th>SATUAN</th>
                                        <th>PENERIMA</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php
                                        $no=1;
                                    @endphp

                                    @foreach($in as $input)
                                        <tr>
                                            <td>
                                                {{$no++}}
                                            </td>
                                            @if ($input->in_cr_at >= now())
                                                <td>
                                                    <a onclick="edit('{{$input->in_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addinput">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a onclick="del('{{$input->in_id}}')" class="btn btn-danger btn-xs waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a onclick="edit('{{$input->in_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addinput">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                {{$input->p_reg}}
                                            </td>
                                            <td>
                                                {{$input->in_asst}}
                                            </td>
                                            <td>
                                                {{$input->in_tgl}}
                                            </td>
                                            <td>
                                                {{$input->in_vndr}}
                                            </td>
                                            <td>
                                                {{$input->mb_kode}}
                                            </td>
                                            <td>
                                                {{$input->mb_nmbar}}
                                            </td>
                                            <td>
                                                {{$input->in_jml}}
                                            </td>
                                            <td>
                                                {{$input->sb_nm}}
                                            </td>
                                            <td>
                                                {{$input->in_pjwb}}
                                            </td>
                                            <td>
                                                {{$input->in_ket}}
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

            <!-- ADD INPUT BARANG -->
            <div class="modal fade" id="addinput" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('admin.input_barang.form')
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
                    var url = "{{route('store_in')}}"
                    $("#reg").attr('disabled', false).val("");
                    $("#nmusr").attr('disabled', false).val("");
                    $("#dprt").attr('disabled', false).val("");
                    $("#asst").val("");
                    $("#nmbarang").attr('disabled', false).val("");
                    $("#vndr").val("");
                    $("#jml").attr('disabled', false).val("");
                    $("#ket").val("");
                    $("#pjwb").val("");
                    $("#form-in").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_in','iniuuidinput')}}";
                    urlGet = urlGet.replace('iniuuidinput',id);

                    var urlPost = "{{route('upd_in','iniuuidinput')}}";
                    urlPost = urlPost.replace('iniuuidinput',id);

                    $.get(urlGet, function(data){
                        $("#reg").attr('disabled', true).val(data.in.p_reg);
                        $("#nmusr").attr('disabled', true).val(data.in.p_nmusr);
                        $("#dprt").attr('disabled', true).val(data.in.p_dprt);
                        $("#asst").val(data.in.in_asst);
                        $("#nmbarang").attr('disabled', true).val(data.in.mb_nmbar);
                        $("#vndr").val(data.in.in_vndr);
                        $("#jml").attr('disabled', true).val(data.in.in_jml);
                        $("#ket").val(data.in.in_ket);
                        $("#pjwb").val(data.in.in_pjwb);
                    });

                    $("#form-in").attr("action", urlPost);

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
                    var url = "{{route('del_in','iniuuidinput')}}";
                    url = url.replace('iniuuidinput',id);

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
