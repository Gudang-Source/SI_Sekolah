<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Guru</h5>
                <?php echo form_open('guru/add','role="form"'); ?>
                <div class="position-relative form-group"><label class="">Nomor Unik Pendidik Tenaga Kependidikan</label>
                    <input name="nuptk" placeholder="Masukan NUPTK" type="text" class="col-md-6 form-control">
                </div>
                <div class="position-relative form-group"><label class="">Nama Lengkap</label>
                    <input name="nama" placeholder="Masukan Nama Lengkap" type="text" class="form-control col-md-6">
                </div>
                <div class="position-relative form-group"><label class="">Jenis Kelamin</label>
                    <?php
                    echo form_dropdown('gender', array('W'=>'Perempuan','P'=>'Laki-Laki'),null , "class='form-control col-md-2'"); ?>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Agama</label>
                            <?php echo combo_dinamis('agama','tbl_agama','nama_agama','kd_agama',['kd_agama'],null); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>