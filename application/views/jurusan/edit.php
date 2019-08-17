<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <h5 class="card-title">Input Data jurusan</h5>
                <?php   echo form_open('jurusan/edit','role="form"');
                echo form_hidden('kd_jurusan',$jurusan['kd_jurusan']);
                ?>
                <div class="position-relative form-group">
                    <label class="">Kode Jurusan Kelas</label>
                    <input name="id" type="text" value="<?php echo $jurusan['kd_jurusan']?>" placeholder="Masukan ID Jurusan" type="text" class="col-md-6 form-control">
                </div>
                <div class="position-relative form-group">
                    <label class="">Nama Jurusan</label>
                    <input name="nama" value="<?php echo $jurusan['nama_jurusan']?>" placeholder="Masukan Nama Jurusan" type="text" class="form-control col-md-6">
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>