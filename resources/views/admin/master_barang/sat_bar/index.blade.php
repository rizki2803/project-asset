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
                                DATA SATUAN BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a onclick="crt()" data-toggle="modal" data-target="#ModalSatBar">Add Satuan Barang</a></li>
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
                                            <th class="col-sm-8">NAMA SATUAN</th>
                                            <th class="col-sm-3">ACT</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA SATUAN</th>
                                            <th>ACT</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach($sb as $satuan)
                                            <tr>
                                                <td>
                                                    {{$no++}}
                                                </td>
                                                <td>
                                                    {{$satuan->sb_nm}}
                                                </td>
                                                <td>
                                                    <a onclick="edit('{{$satuan->sb_id}}')" class="btn btn-warning btn-xs waves-effect" id="editsb" data-toggle="modal" data-target="#ModalSatBar">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a href="{{route('del_sb',$satuan->sb_id)}}" class="btn btn-danger btn-xs waves-effect delete-confirm">
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

            <!-- Modal SATUAN BARANG -->
            <div class="modal fade" id="ModalSatBar" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <form id="form-sb" method="post" action="">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="ModalSatBarLabel">Masukkan Data Untuk Satuan Barang</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="satuan" value="" class="form-control" name="sb_nm" id="sb_nm" placeholder="Nama Satuan" />
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
                        var url = "{{route('store_sb')}}"
                        $("#sb_nm").val("");
                        $("#form-sb").attr("action", url);
                    }

                    function edit(id) {
                        var urlGet = "{{route('edit_sb','iniuuidsatuan')}}";
                        urlGet = urlGet.replace('iniuuidsatuan',id);

                        var urlPost = "{{route('upd_sb','iniuuidsatuan')}}";
                        urlPost = urlPost.replace('iniuuidsatuan',id);

                        $.get(urlGet, function(data){
                            $("#sb_nm").val(data.sb.sb_nm);
                        });

                        $("#form-sb").attr("action", urlPost);

                    }
                </script>

        </div>
    </section>

@endsection
