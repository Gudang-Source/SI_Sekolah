<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <h5 class="card-title">Input Data Sekolah</h5>
                <?php echo form_open('sekolah/update','role="form"'); ?>
                <?php echo form_hidden('id_sekolah', $info['id_sekolah'] ); ?>
                <div class="position-relative form-group"><label class="">Nama Sekolah</label>
                    <input name="nama_sekolah" value="<?php echo $info['nama_sekolah'];?>" placeholder="Masukan Nama Sekolah" type="text" class="form-control col-md-10">
                </div>
                <div class="position-relative form-group"><label class="">Alamat</label>
                    <input name="alamat" value="<?php echo $info['alamat_sekolah'];?>" placeholder="Masukan Alamat Sekolah" type="text" class="form-control col-md-10"> 
                </div>
                <div class="position-relative form-group">
                    <label class="">Jenjang Sekolah</label>
                    <?php echo combo_dinamis('jenjang','tbl_jenjang_sekolah','nama_jenjang','id_jenjang', $info['id_jenjang_sekolah'], null); ?>
                </div>
                <div class="position-relative form-group"><label class="">Telepon</label>
                    <input name="telpon" value="<?php echo $info['telpon'];?>" placeholder="Masukan Nomor Telepon Sekolah" type="text" class="form-control col-md-4">
                </div>
                <div class="position-relative form-group"><label class="">Email</label>
                    <input name="email" value="<?php echo $info['email'];?>" placeholder="Masukan Alamat Email Sekolah" type="text" class="form-control col-md-4">
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
</div>