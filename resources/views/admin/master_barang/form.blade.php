<form id="form-mb" method="post" action="" onsubmit="submitbtn.disabled=true; return true;">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="ModalMstrBarLabel">Masukkan Data Untuk Stok Master Barang</h4>
    </div>
    <div class="modal-body">
        <div class="col-sm-6">
            <label>Nama Barang</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="namabarang" value="" class="form-control" name="mb_nmbar" id="mb_nmbar" required="required" placeholder="Masukan Nama Barang" />
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Satuan</label>
            <div class="form-group">
                <div class="form-line">
                    {{Form::select('satuan', $sb, null, ['class'=>'form-control ','id'=>'sb','required'=>'required'])}}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Kategori</label>
            <div class="form-group">
                <div class="form-line">
                    {{Form::select('kategori', $kt, null, ['class'=>'form-control ','id'=>'kt','required'=>'required'])}}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Min Stok</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="minjml" value="" class="form-control" name="mb_minjml" id="mb_minjml" required="required" onkeypress="return event.charCode >= 48 && event.charCode <=57" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-link waves-effect" name="submitbtn">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
</form>
