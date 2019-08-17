<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <h5 class="card-title">Input Data ruang</h5>
                <?php   echo form_open('ruang/edit','role="form"');
                echo form_hidden('kd_ruang',$ruang['kd_ruang']);
                ?>
                <div class="position-relative form-group">
                    <label class="">Kode Ruang Kelas</label>
                    <input name="id" type="text" value="<?php echo $ruang['kd_ruang']?>" placeholder="Masukan ID" type="text" class="col-md-6 form-control">
                </div>
                <div class="position-relative form-group">
                    <label class="">Nama Ruang Kelas</label>
                    <input name="nama" value="<?php echo $ruang['nama_ruang']?>" placeholder="Masukan Nama Ruang Kelas" type="text" class="form-control col-md-6">
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>