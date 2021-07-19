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
                                    <tr>
                                        <td>ACT</td>
                                        <td>NO REG</td>
                                        <td>ASSET</td>
                                        <td>TGL TERIMA</td>
                                        <td>VENDOR</td>
                                        <td>KODE</td>
                                        <td>NAMA BARANG</td>
                                        <td>JML</td>
                                        <td>SATUAN</td>
                                        <td>PENERIMA</td>
                                        <td>KETERANGAN</td>
                                    </tr>
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

                    console.log(url);

                    $("#form-in").attr("action", url);
                }

            </script>

        </div>
    </section>

@endsection
