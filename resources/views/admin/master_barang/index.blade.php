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
                                DATA MASTER BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#addmstr">Add Master Barang</a></li>
                                        <li><a href="{{route('sat_bar')}}">Satuan Barang</a></li>
                                        <li><a href="{{route('kat_bar')}}">Kategori Barang</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>KATEGORI BARANG</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ACT</th>
                                        <th>KODE</th>
                                        <th class="col-sm-4">NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>KATEGORI BARANG</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach($mb as $master)
                                            <tr>
                                                <td>
                                                    {{$no++}}
                                                </td>
                                                <td>
                                                    <a onclick="edit('{{$master->mb_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addmstr">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a href="{{route('del_mb',$master->mb_id)}}" class="btn btn-danger btn-xs waves-effect delete-confirm">
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
                                            </tr>
                                        @endforeach
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
                    $("#kt").val("");
                    $("#sb").val("");
                    $("#form-mb").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_mb','iniuuidmaster')}}";
                    urlGet = urlGet.replace('iniuuidmaster',id);

                    var urlPost = "{{route('upd_mb','iniuuidmaster')}}";
                    urlPost = urlPost.replace('iniuuidmaster',id);

                    $.get(urlGet, function(data){
                        $("#mb_nmbar").val(data.mb.mb_nmbar);
                        $("#kt").attr('disabled', 'true').val(data.mb.kt_nm);
                        $("#sb").val(data.mb.sb_nm);
                    });

                    $("#form-mb").attr("action", urlPost);

                }
            </script>

        </div>
    </section>

@endsection
