<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Detail Kurikulum</h5>
                <?php echo form_open('kurikulum/addDetail','role="form"'); ?>
                <div class="col col-md-6 position-relative form-group">
                    <label class="">ID Kurikulum</label>
                    <?php echo combo_dinamis('kurikulum','tbl_kurikulum','nama_kurikulum','id_kurikulum',$this->uri->segment(3),null); ?>
                </div>
                <div class="col col-md-6 position-relative form-group">
                    <label class="">Nama Mata Pelajaran</label>
                    <?php echo combo_dinamis('mapel','tbl_mapel','nama_mapel','kd_mapel','kd_mapel',null); ?>
                </div>
                <div class="col col-md-6 position-relative form-group">
                    <label class="">Jurusan</label>
                    <?php echo combo_dinamis('jurusan','tbl_jurusan','nama_jurusan','kd_jurusan','kd_jurusan',null); ?>
                </div>
                <div class="col col-md-6 position-relative form-group">
                    <label class="">Kelas</label>
                    <select name="kelas" class="form-control">
                        <?php
                        for ($i=1; $i<=$info['jumlah_kelas'] ; $i++) { 
                            echo "<option value='$i'>Kelas $i</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>