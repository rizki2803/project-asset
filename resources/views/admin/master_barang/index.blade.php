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

                                                    <a onclick="del('{{$master->mb_id}}')" class="btn btn-danger btn-xs waves-effect">
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

                function del(id) {
                    var url = "{{route('del_mb','iniuuidmaster')}}";
                    url = url.replace('iniuuidmaster',id);

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
