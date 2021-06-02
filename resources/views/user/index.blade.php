<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

    <!-- Custom Css -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b>BSB</b></a>
        <small>Admin BootStrap Based - Material Design</small>
    </div>
    <div class="card">
        <div class="body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">HOME</a></li>
                <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">PROFILE</a></li>
                <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">MESSAGES</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home">
                    <b>PILIH :</b>
                    <div class="form-group">
                        <input type="radio" name="user" id="rusak" class="with-gap">
                        <label for="rusak">Kerusakan Barang </label>

                        <input type="radio" name="user" id="pengajuan" class="with-gap">
                        <label for="pengajuan" class="m-l-20">Pengajuan Barang </label>
                    </div>
                    <b>NAMA PEGAWAI</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="NAMA PEGAWAI">
                            </div>
                        </div>
                    <b>DEPARTEMEN</b>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="DEPARTEMEN">
                            </div>
                        </div>
                    <b>EMAIL</b>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="EMAIL">
                        </div>
                    </div>
                    <b>NAMA ATAS</b>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="NAMA ATASAN">
                        </div>
                    </div>
                    <b>NO ASSET</b>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="NO ASSET">
                        </div>
                    </div>
                    <b>MERK/TYPE</b>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="MERK/TYPE">
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile">
                    <b>Profile Content</b>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="EMAIL">
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="messages">
                    <b>Message Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <b>Settings Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



<!-- Jquery Core Js -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets')}}/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('assets')}}/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/admin.js"></script>
<script src="{{asset('assets')}}/js/pages/examples/sign-in.js"></script>
</body>

</html>
