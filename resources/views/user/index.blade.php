@extends('layouts.app')

@section('content')
 <div class="container" >
    <div class="col-md-pull-4 col-sm-pull-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">FORM</a></li>
                    <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">CHECK PENGAJUAN</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home">
                        <form class="tab-content" method="post" action="{{route('store_p')}}">
                            @csrf
                            <label>Pilih :</label>
                            <div class="form-group">
                                <input type="radio" name="pengajuan" id="p_ada"  value="P" checked class="with-gap">
                                <label for="p_ada"><b>Pengajuan Barang</b> </label>
                                <input type="radio" name="pengajuan" id="p_rsk" value="K" checked class="with-gap">
                                <label for="p_rsk"><b>Kerusakan Barang</b></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK</label>
                                        <input id="nik" name="nik" type="text" class="form-control" placeholder="NIK            ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Pegawai</label>
                                        <input id="nmusr" name="nmusr" type="text" class="form-control" placeholder="Nama Pegawai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Departemen</label>
                                        <input id="dprt" name="dprt" type="text" class="form-control" placeholder="DEPARTEMEN">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Email</label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="EMAIL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Atasan</label>
                                        <input id="atsn" name="atsn" type="text" class="form-control" placeholder="NAMA ATASAN">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" id="form_asset">
                                    <div class="form-line">
                                        <label>NO Asset</label>
                                        <input id="asst" name="asst" type="text" class="form-control" placeholder="NO Asset">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Detail</label>
                                        <input id="desk" name="desk" type="text" class="form-control" placeholder="DETAIL">
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
                        <form class="tab-content" action="{{route('user.detailKodeRegistrasi')}}">
                            <label>Silahkan Masukan Kode Registasi</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode_regis" class="form-control" placeholder="Kode Regist">
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                        <br>
                        <br>

                        <label>Detail</label>
                    </div>
                </div>

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
 <!-- Demo Js -->
 <script src="{{asset('assets')}}/js/demo.js"></script>
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

 <!-- Custom Js -->
 <script src="{{asset('assets')}}/js/admin.js"></script>
 <script src="{{asset('assets')}} /js/pages/examples/sign-in.js"></script>

 <script>
     $(function() {
         $('#nik').on('input', function(event){
             event.preventDefault();

             var url =  "{{route('user.getDataPegawai', ':nik')}}";
             url = url.replace(':nik', $('#nik').val());

             var pegawai = $.ajax({
                 url : url,
                 method: "GET",
                 success: function (response) {
                     $('#nmusr').val(response.a_nmusr);
                     $('#dprt').val(response.a_dprt);
                     $('#email').val(response.a_email);
                     $('#atsn').val(response.a_atsn);

                 },
                 error: function(){
                        console.log('500');
                 }
             });
         });

         $(':radio').on('change', function() {
             var asset = $("input[name='pengajuan']:checked").val();

             if (asset == 'P') {
                 console.log(asset);
                 $('#asst').val("");
                 $('#form_asset').hide();
             } else {
                 // console.log(Instansi);
                 $('#form_asset').show();

                 $('#asst').attr('enabled', true);
             }
         })
             .filter(':checked').change();

     });
 </script>




@endsection
