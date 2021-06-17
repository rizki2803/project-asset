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
                                DATA MASTER BARANG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#addmstr">Add Master Barang</a></li>
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
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>KATEGORI BARANG</th>
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
            <!-- #END# Basic Examples -->

            <!-- ADD MASTER BARANG -->
            <div class="modal fade" id="addmstr" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="ModalMstrBarLabel">Masukkan Data Untuk Master Barang</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="kode" value="" class="form-control" name="mb_kode" id="mb_kode" placeholder="Kode" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="namabarang" value="" class="form-control" name="mb_nmbar" id="mb_nmbar" placeholder="Nama Barang" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="satuan" value="" class="form-control" name="sb" id="sb" placeholder="Satuan" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="kategori" value="" class="form-control" name="kt" id="kt" placeholder="Kategori" />
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

        </div>
    </section>

@endsection
