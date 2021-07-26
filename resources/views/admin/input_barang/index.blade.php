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
                                            <td>
                                                <a onclick="edit('{{$input->in_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addinput">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <a href="{{route('del_in',$input->in_id)}}" class="btn btn-danger btn-xs waves-effect">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
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

                function crt() {
                    var url = "{{route('store_in')}}"
                    $("#reg").val("");
                    $("#nmusr").val("");
                    $("#dprt").val("");
                    $("#asst").val("");
                    $("#nmbarang").val("");
                    $("#vndr").val("");
                    $("#jml").val("");
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
                        $("#reg").attr('disabled', 'true').val(data.in.p_reg);
                        $("#nmusr").attr('disabled', 'true').val(data.in.p_nmusr);
                        $("#dprt").attr('disabled', 'true').val(data.in.p_dprt);
                        $("#asst").val(data.in.in_asst);
                        $("#nmbarang").attr('disabled', 'true').val(data.in.mb_nmbar);
                        $("#vndr").val(data.in.in_vndr);
                        $("#jml").attr('disabled', 'true').val(data.in.in_jml);
                        $("#ket").val(data.in.in_ket);
                        $("#pjwb").val(data.in.in_pjwb);
                    });

                    $("#form-in").attr("action", urlPost);

                }


            </script>

        </div>
    </section>

@endsection
