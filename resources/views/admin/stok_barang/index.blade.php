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
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>KELUAR</th>
                                        <th>MASUK</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-1">KODE</th>
                                        <th class="col-sm-4">NAMA BARANG</th>
                                        <th class="col-sm-2">KATEGORI</th>
                                        <th class="col-sm-1">JUMLAH</th>
                                        <th class="col-sm-1">SATUAN</th>
                                        <th class="col-sm-1">KELUAR</th>
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

        </div>
    </section>

@endsection