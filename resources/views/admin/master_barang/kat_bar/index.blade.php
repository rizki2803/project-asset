@extends('admin.layout.layout')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KATEGORI BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#ModalKatBar">Add Kategori Barang</a></li>
                                        <li><a href="{{route('mstr_bar')}}">Back</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-1">NO</th>
                                        <th class="col-sm-3">KODE INISIAL KATEGORI</th>
                                        <th class="col-sm-5">NAMA KATEGORI</th>
                                        <th class="col-sm-3">ACT</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>KODE INISIAL KATEGORI</th>
                                        <th>NAMA KATEGORI</th>
                                        <th>ACT</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach($kt as $kategori)
                                            <tr>
                                                <td>
                                                    {{$no++}}
                                                </td>
                                                <td>
                                                    {{$kategori->kt_kode}}
                                                </td>
                                                <td>
                                                    {{$kategori->kt_nm}}
                                                </td>
                                                <td>
                                                    <a onclick="edit('{{$kategori->kt_id}}')" class="btn btn-warning btn-xs waves-effect" id="editkt" data-toggle="modal" data-target="#ModalKatBar">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a href="{{route('del_kt',$kategori->kt_id)}}" class="btn btn-danger btn-xs waves-effect delete-confirm">
                                                        <i class="material-icons">delete</i>
                                                    </a>
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

            <!-- MODAL KATEGORI BARANG -->
            <div class="modal fade" id="ModalKatBar" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form-kt" method="post" action="">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="ModalKatBarLabel">Masukkan Data Untuk Kategori Barang</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="kategori" value="" class="form-control" name="kt_nm" id="kt_nm" placeholder="Nama Kategori" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="inisial" value="" class="form-control" name="kt_kode" id="kt_kode" placeholder="Inisial Kode" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function crt() {
                    var url = "{{route('store_kt')}}"
                    $("#kt_nm").val("");
                    $("#kt_kode").val("");
                    $("#form-kt").attr("action", url);
                }

                function edit(id) {
                    var urlGet = "{{route('edit_kt','iniuuidkategori')}}";
                    urlGet = urlGet.replace('iniuuidkategori',id);

                    var urlPost = "{{route('upd_kt','iniuuidkategori')}}";
                    urlPost = urlPost.replace('iniuuidkategori',id);

                    $.get(urlGet, function(data){
                        $("#kt_nm").val(data.kt.kt_nm);
                        $("#kt_kode").val(data.kt.kt_kode);
                    });

                    $("#form-kt").attr("action", urlPost);

                }
            </script>

        </div>
    </section>


@endsection
