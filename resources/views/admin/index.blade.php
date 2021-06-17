@extends('admin.layout.layout')
@section('content')
    <style>
        .card {
            background: linear-gradient(to right, #2a1f4c 45%, #ef9b11 80%)
        }
    </style>

    <section class="content">
        <div class="card">
            <div class="container-fluid">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/helper-classes.html">
                        <div class="info-box bg-lime hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons" >assignment</i>
                            </div>
                            <div class="content">
                                <div class="text" >LIST PENGAJUAN</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/typography.html">
                        <div class="info-box bg-amber hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">build</i>
                            </div>
                            <div class="content">
                                <div class="text">LIST SERVICE</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/typography.html">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">widgets</i>
                            </div>
                            <div class="content">
                                <div class="text">MASTER BARANG</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/typography.html">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">layers</i>
                            </div>
                            <div class="content">
                                <div class="text">STOK BARANG</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/typography.html">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">compare_arrows</i>
                            </div>
                            <div class="content">
                                <div class="text">BARANG MASUK</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{asset('assets')}}/pages/typography.html">
                        <div class="info-box bg-indigo hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">swap_horiz</i>
                            </div>
                            <div class="content">
                                <div class="text">BARANG KELUAR</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>






@endsection
