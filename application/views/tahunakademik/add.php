<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Tahun Akademik</h5>
                <?php echo form_open('tahunakademik/add','role="form"'); ?>
                <div class="position-relative form-group"><label class="">Tahun Akademik</label>
                    <input name="nama" placeholder="Masukan Tahun Akademik" type="text" class="form-control col-md-6">
                </div>
                <div class="position-relative form-group">
                    <label class="">Status Tahun Akademik</label>
                    <?php echo form_dropdown('status', array('y'=>'Aktif','n'=>'Tidak Aktif'),null ,"class='form-control col-md-2'"); ?>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>