<!DOCTYPE html>
<html>
<style>
    .background {
        background: linear-gradient(to right, #2a1f4c 45%, #ef9b11 80%)
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('img')}}/HariffLogo.png" />
    <title>PT.Hariff DTE</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets')}}/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets')}}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets')}}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{{asset('assets')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets')}}/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="background">
<div class="content-header">
    <div class="container">
        <div class="col-md-12">
            <center>
                <img class="profile-user-img img-fluid img-circle" src="{{asset('img')}}/HariffLogo1.jpeg" alt="AdminBSB - Profile Image">
                <h1 class="m-0 text-light"><font color="white">HARIFF</font></h1>
                <small><font color="white">PT.Hariff Daya Tunggal Engineering</font></small>
            </center>
        </div><!-- /.col -->
    </div>
</div>
<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">FORM</a></li>
                    <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">CHECK PENGAJUAN</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home">
                        <form class="tab-content">
                            <label>Pilih :</label>
                            <div class="form-group">
                                <input type="radio" name="pil_aktif" id="pil_aktif"  value="NO" checked class="with-gap">
                                <label for="pil_aktif"><b>Pengajuan Barang</b> </label>
                                <input type="radio" name="pil_aktif" id="pil_aktif1" value="OK" checked class="with-gap">
                                <label for="pil_aktif1"><b>Kerusakan Barang</b></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Pegawai</label>
                                        <input id="p_nmusr" type="text" class="form-control" placeholder="Nama Pegawai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Departemen</label>
                                        <input id="p_dprt" type="text" class="form-control" placeholder="DEPARTEMEN">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Email</label>
                                        <input id="p_email" type="text" class="form-control" placeholder="EMAIL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Atasan</label>
                                        <input id="p_atsn" type="text" class="form-control" placeholder="NAMA ATASAN">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Merk/Type</label>
                                        <input  id="p_merk" name="nama_aktif" type="text" class="form-control" placeholder="MERK/TYPE">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Jenis Barang</label>
                                        {{Form::text('jenisbarang', null, ['list'=>'jenis_bar','placeholder'=>'Jenis Barang','class'=>'form-control ','id'=>'pic','autocomplete'=>'off','rows'=>'10'])}}
                                            <datalist  id="jenis_bar" rows="10">
                                                @foreach($mb as $master)
                                                    <option value="{{$master}}"></option>
                                                @endforeach
                                            </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group" id="form_instansi">
                                    <div class="form-line">
                                        <label>NO Asset</label>
                                        <input id="p_asst" name="nama_aktif" type="text" class="form-control" placeholder="NO Asset">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Detail</label>
                                        <input id="p_desk" type="text" class="form-control" placeholder="DETAIL">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix js-sweetalert">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <button class="btn btn-primary waves-effect" data-type="success">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- aset -->
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                        <form class="tab-content">
                            <label>Silahkan Masukan Kode Registasi</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Kode Regist">
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>



<!-- #END# Multi Column -->

<!-- Jquery Core Js -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="{{asset('assets')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('assets')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets')}}/plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{asset('assets')}}/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{asset('assets')}}/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/admin.js"></script>
<script src="{{asset('assets')}}/js/pages/ui/dialogs.js"></script>

<!-- Demo Js -->
<script src="{{asset('assets')}}/js/demo.js"></script>

<script>
    $(function() {

        $(':radio').on('change', function() {
            var noasset = $("input[name='pil_aktif']:checked").val();

            if (noasset == 'NO') {
                // console.log(Instansi);
                $('#nama_instansi').val("");
                $('#form_instansi').hide();
                $('#nama_instansi').attr('enabled', true);
            } else {
                // console.log(Instansi);
                $('#form_instansi').show();

                $('#nama_instansi').attr('disabled', true);
            }
        })
            .filter(':checked').change();

        $('.form-prevent-multiple-submits').on('submit', function(){
            $('.button-prevent-multiple-submits').attr('disabled', 'true');
        });
    });
</script>


