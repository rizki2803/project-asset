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
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>DEPARTEMENT</th>
                                        <th>NAMA ATASAN</th>
                                        <th>DETAIL BARANG</th>
                                        <th>STATUS</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="col-sm-1">NO REG</th>
                                        <th class="col-sm-1">NIK</th>
                                        <th class="col-sm-2">NAMA</th>
                                        <th class="col-sm-2">DEPARTEMENT</th>
                                        <th class="col-sm-3">NAMA ATASAN</th>
                                        <th class="col-sm-3">DETAIL BARANG</th>
                                        <th class="col-sm-2">STATUS</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($mb as $pengajuan)
                                        <tr>
                                            <td>
                                                {{$pengajuan->p_reg}}
                                            </td>
                                            <td>
                                                {{$pengajuan->p_nik}}
                                            </td>
                                            <td>
                                                {{$pengajuan->p_nmusr}}
                                            </td>
                                            <td>
                                                {{$pengajuan->p_dprt}}
                                            </td>
                                            <td>
                                                {{$pengajuan->p_atsn}}
                                            </td>
                                            <td>
                                                {{$pengajuan->p_desk}}
                                            </td>
                                            <td>
                                                {{$status[$pengajuan->a_stat]}}
                                                ({{$pengajuan->a_nm}})
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
        </div>
    </section>

@endsection
