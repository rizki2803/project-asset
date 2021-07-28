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
                                            <td>
                                                <a onclick="edit('{{$output->out_id}}')" class="btn btn-warning btn-xs waves-effect" id="editmb" data-toggle="modal" data-target="#addoutput">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <a href="{{route('del_out',$output->out_id)}}" class="btn btn-danger btn-xs waves-effect">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
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

            </script>

        </div>
    </section>

@endsection
