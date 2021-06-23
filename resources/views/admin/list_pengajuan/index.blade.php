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
                                DATA LIST PENGAJUAN
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>NO REG</th>
                                        <th>NAMA</th>
                                        <th>DEPARTEMENT</th>
                                        <th>NAMA BARANG</th>
                                        <th>STATUS</th>
                                        <th>UPD AT</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-3">NAMA</th>
                                        <th class="col-sm-2">DEPARTEMENT</th>
                                        <th class="col-sm-3">NAMA BARANG</th>
                                        <th class="col-sm-1">STATUS</th>
                                        <th class="col-sm-2">UPD AT</th>

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
