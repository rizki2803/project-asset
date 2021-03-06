<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('mstr_bar')}}">
                        <i class="material-icons">layers</i>
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('in_bar')}}">
                        <i class="material-icons">compare_arrows</i>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('out_bar')}}">
                        <i class="material-icons">swap_horiz</i>
                        <span>Barang Keluar <Keluar></Keluar></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('list_p')}}">
                        <i class="material-icons">assignment</i>
                        <span>List Pengajuan<Keluar></Keluar></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('srvc_bar')}}">
                        <i class="material-icons">build</i>
                        <span>Service Barang <Keluar></Keluar></span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2021 <a href="javascript:void(0);"><a href="https://hariff.co.id/">PT.Hariff DTE</a></a> All rights reserved.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>

<div class="content-wrapper body">
    @yield('content')
</div>

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

<!-- Bootstrap Notify Plugin Js -->
<script src="{{asset('assets')}}/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{asset('assets')}}/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/admin.js"></script>
<script src="{{asset('assets')}}/js/pages/examples/profile.js"></script>
<script src="{{asset('assets')}}/js/pages/forms/basic-form-elements.js"></script>
<script src="{{asset('assets')}}/js/pages/ui/dialogs.js"></script>

<!-- Demo Js -->
<script src="{{asset('assets')}}/js/demo.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{asset('assets')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/pages/tables/jquery-datatable.js"></script>

<!-- Autosize Plugin Js -->
<script src="{{asset('assets')}}/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="{{asset('assets')}}/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('assets')}}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="{{asset('assets')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


</body>

</html>
