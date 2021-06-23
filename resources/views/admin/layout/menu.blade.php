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
                        <i class="material-icons">widgets</i>
                        <span>Master Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('assets')}}/pages/helper-classes.html">
                        <i class="material-icons">layers</i>
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('assets')}}/pages/helper-classes.html">
                        <i class="material-icons">compare_arrows</i>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('assets')}}/pages/helper-classes.html">
                        <i class="material-icons">swap_horiz</i>
                        <span>Barang Keluar <Keluar></Keluar></span>
                    </a>
                </li>
                <li>
                    <a href="{{asset('assets')}}/pages/helper-classes.html">
                        <i class="material-icons">assignment</i>
                        <span>Form Pengajuan<Keluar></Keluar></span>
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

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/admin.js"></script>
<script src="{{asset('assets')}}/js/pages/examples/profile.js"></script>

<!-- Demo Js -->
<script src="{{asset('assets')}}/js/demo.js"></script>



<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{asset('assets')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/pages/tables/jquery-datatable.js"></script>

</body>

</html>
