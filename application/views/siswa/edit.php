<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Siswa</h5>
                <?php   echo form_open('siswa/edit','role="form"');
                        echo form_hidden('nim',$siswa['nim']);
                ?>
                <div class="position-relative form-group"><label class="">Nomor Induk Murid</label>
                    <input readonly=""  value="<?php echo $siswa['nim']?>" placeholder="Masukan Nomor Induk Murid" type="text" class="col-md-6 form-control">
                </div>
                <div class="position-relative form-group"><label class="">Nama Lengkap</label>
                    <input name="nama" value="<?php echo $siswa['nama']?>" placeholder="Masukan Nama Lengkap" type="text" class="form-control col-md-6">
                </div>
                <div class="position-relative form-group"><label class="">Jenis Kelamin</label>
                    <?php echo form_dropdown('gender', array('W'=>'Perempuan','P'=>'Laki-Laki'),$siswa['gender'],"class='form-control col-md-2'"); ?>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Agama</label>
                            <?php echo combo_dinamis('agama','tbl_agama','nama_agama','kd_agama',$siswa['kd_agama'],null); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label  class="">Tempat Lahir</label>
                            <input name="tempat_lahir" value="<?php echo $siswa['tempat_lahir']?>" placeholder="Kota Lahir" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label class="">Tanggal Lahir</label>
                            <input name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']?>" placeholder="" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>