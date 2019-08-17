<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <h5 class="card-title">Input Data Tahun Akademik</h5>
                <?php   echo form_open('tahunakademik/edit','role="form"');
                echo form_hidden('id_tahun_akademik',$tahun_akademik['id_tahun_akademik']);
                ?>
                <div class="position-relative form-group">
                    <label class="">Tahun Akademik</label>
                    <input name="nama" value="<?php echo $tahun_akademik['tahun_akademik']?>" placeholder="Masukan Tahun Akademik" type="text" class="form-control col-md-6">
                </div>
                <div class="position-relative form-group">
                    <label class="">Status Tahun Akademik</label>
                    <?php echo form_dropdown('status', array('y'=>'Aktif','n'=>'Tidak Aktif'),$tahun_akademik['is_aktif'],"class='form-control col-md-2'"); ?>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>