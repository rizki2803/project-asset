<form id="form-out" class="form-horizontal" method="post" action="" onsubmit="submitbtn.disabled=true; return true;">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="ModalInputLabel">Masukkan Data Untuk Keluaran Barang</h4>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-5">
            <div class="form-group">
                <label>No Registrasi</label>
                <div class="form-line">
                    {{Form::text('reg', null, ['list'=>'nreg','placeholder'=>'Masukkan No REG User','class'=>'form-control ','id'=>'reg','autocomplete'=>'off','rows'=>'10','onkeyup'=>'isi_otomatis()'])}}
                    <datalist  id="nreg" rows="10">
                        @foreach($bp as $master)
                            <option value="{{$master}}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Nama User</label>
                <div class="form-line">
                    <input type="text" value="" class="form-control" name="nmusr" id="nmusr" required="required" placeholder="Masukkan Nama User" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-12">
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
                <label>Nama Barang</label>
                <div class="form-line">
                    {{Form::text('nmbarang', null, ['list'=>'nmbar','placeholder'=>'Masukkan Nama Barang','class'=>'form-control ','id'=>'nmbarang','autocomplete'=>'off','rows'=>'10'])}}
                    <datalist  id="nmbar" rows="10">
                        @foreach($mb as $master)
                            <option value="{{$master}}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body clearfix">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Jumlah Barang</label>
                <div class="form-line">
                    <input type="number" min="1" value="" class="form-control" name="jml" id="jml" required="required" placeholder="Masukkan Jumlah Barang" />
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Pemberi Keluaran Barang</label>
                <div class="form-line">
                    <input type="text" value="" class="form-control" name="pjwb" id="pjwb" required="required" />
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
    <div class="modal-footer">
        <button type="submit" class="btn btn-link waves-effect" name="submitbtn">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
</form>
