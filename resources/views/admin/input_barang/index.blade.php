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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>NO REG</th>
                                        <th>KODE</th>
                                        <th>NAMA BARANG</th>
                                        <th>KATEGORI</th>
                                        <th>SATUAN</th>
                                        <th>MASUK</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-1">KODE</th>
                                        <th class="col-sm-5">NAMA BARANG</th>
                                        <th class="col-sm-2">KATEGORI</th>
                                        <th class="col-sm-2">SATUAN</th>
                                        <th class="col-sm-1">MASUK</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>

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
                }

            </script>

        </div>
    </section>

@endsection
