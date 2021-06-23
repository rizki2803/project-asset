<form id="form-mb" method="post" action="">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="ModalMstrBarLabel">Masukkan Data Untuk Master Barang</h4>
    </div>
    <div class="modal-body">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="form-line">
                    <input type="namabarang" value="" class="form-control" name="mb_nmbar" id="mb_nmbar" placeholder="Nama Barang" />
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="form-line">
                    {{Form::select('satuan', $sb, null, ['class'=>'form-control ','id'=>'sb'])}}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="form-line">
                    {{Form::select('kategori', $kt, null, ['class'=>'form-control ','id'=>'kt'])}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    </div>
</form>
