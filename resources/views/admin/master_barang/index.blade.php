@extends('admin.layout.layout')
@section('content')

    <section class="content">
        <div class="container-fluid" >

            <!-- Basic Examples -->
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA STOK BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a onclick="crt()" data-toggle="modal" data-target="#addmstr">
                                                <i class="material-icons">add_box</i>Stok Barang
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('sat_bar')}}">
                                                <i class="material-icons">navigate_next</i>Satuan Barang
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('kat_bar')}}">
                                                <i class="material-icons">navigate_next</i>Kategori Barang
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="body">

                            <div class="row clearfix">
                                <form method="get" action="{{url('/mstr_bar')}}">
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
                                        <a href="{{url('/mstr_bar')}}" class="btn btn-xs btn-primary waves-effect">
                                            <i class="material-icons">sync</i>refresh
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>KATEGORI BARANG</th>
                                        <th>JML STOK</th>
                                        <th>MIN STOK</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>KODE</th>
                                        <th class="col-sm-3">NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>KATEGORI BARANG</th>
                                        <th>JML STOK</th>
                                        <th>MIN STOK</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <div class="row clearfix js-sweetalert">
                                        @php
                                            $no=1;
                                        @endphp

                                        @foreach($mb as $master)
                                            <tr class="{{($master->mb_jml < $master->mb_minjml)?"bg-red":"white"}}">
                                                <td>
                                                    {{$no++}}
                                                </td>
                                                <td>
                                                    <a onclick="edit('{{$master->mb_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addmstr">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a href="{{route('del_mb',$master->mb_id)}}" class="btn btn-danger btn-xs waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$master->mb_kode}}
                                                </td>
                                                <td>
                                                    {{$master->mb_nmbar}}
                                                </td>
                                                <td>
                                                    {{$master->sb_nm}}
                                                </td>
                                                <td>
                                                    {{$master->kt_nm}}
                                                </td>
                                                <td>
                                                    {{($master->mb_jml == "")?"0":$master->mb_jml}}
                                                </td>
                                                <td>
                                                    {{($master->mb_minjml == "")?"0":$master->mb_minjml}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

            <!-- ADD MASTER BARANG -->
            <div class="modal fade" id="addmstr" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        @include('admin.master_barang.form')
                    </div>
                </div>
            </div>

            <script>

                function crt() {
                    var url = "{{route('store_mb')}}"
                    $("#mb_nmbar").val("");
                    $("#kt").attr('disabled', false).val("");
                    $("#sb").val("");
                    $("#mb_minjml").val("");
                    $("#form-mb").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_mb','iniuuidmaster')}}";
                    urlGet = urlGet.replace('iniuuidmaster',id);

                    var urlPost = "{{route('upd_mb','iniuuidmaster')}}";
                    urlPost = urlPost.replace('iniuuidmaster',id);

                    $.get(urlGet, function(data){
                        $("#mb_nmbar").val(data.mb.mb_nmbar);
                        $("#kt").attr('disabled', true).val(data.mb.kt_nm);
                        $("#sb").val(data.mb.sb_nm);
                        $("#mb_minjml").val(data.mb.mb_minjml);
                    });

                    $("#form-mb").attr("action", urlPost);

                }

            </script>

        </div>
    </section>

@endsection
