<form id="form-srvc" class="form-horizontal" method="post" action="" onsubmit="submitbtn.disabled=true; return true;">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="ModalInputLabel">Masukkan Data Untuk Kedatangan Barang</h4>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-5">
            <div class="form-group">
                <label>No Registrasi</label>
                <div class="form-line">
                    {{Form::text('reg', null, ['list'=>'nreg','placeholder'=>'Masukkan No REG User','class'=>'form-control ','id'=>'reg','autocomplete'=>'off','rows'=>'10','onkeyup'=>'isi_otomatis()'])}}
                    <datalist  id="nreg" rows="10">
                        @foreach($bp as $pengajuan)
                            <option value="{{$pengajuan}}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nama User</label>
                <div class="form-line">
                    <input type="text" value="" class="form-control" name="nmusr" id="nmusr" required="required" placeholder="Masukkan Nama User" />
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nama Departemen</label>
                <div class="form-line">
                    <input type="text" value="" class="form-control" name="dprt" id="dprt" required="required" placeholder="Masukkan Nama Departemen User" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Keterangan</label>
                <div class="form-line">
                    <textarea class="form-control" rows="3" id="ket" name="ket" value="" placeholder="Masukkan Keterangan (optional)"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-7">
            <div class="form-group">
                <label>Nama Vendor</label>
                <div class="form-line">
                    <input type="text" value="" class="form-control" name="vndr" id="vndr" placeholder="Masukkan Nama Vendor (optional)" />
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
            <label>Posisi Barang</label>
                <div class="form-line">
                    <select class="form-control show-tick" name="pss" id="pss" required="required">
                        <option value="">-- Pilih Letak Posisi Barang --</option>
                        <option value="0">Karyawan</option>
                        <option value="1">Vendor</option>
                        <option value="2">Departemen IT</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-8">
            <div class="form-group">
                <label>Estimasi Penyelesaian Barang</label>
                    <div class="input-daterange input-group" id="bs_datepicker_container">
                        <div class="form-line">
                            <input type="text" readonly id="estMax" name="estMax" value="" class="form-control" placeholder="Jangka Waktu Penyelesaian Service"/>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-link waves-effect" name="submitbtn">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
</form>
