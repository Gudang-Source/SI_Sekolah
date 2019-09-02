<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Input Data Kelompok Belajar</h5>
                <?php echo form_open('kelompok/add','role="form"'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                        <input name="id" placeholder="Masukan ID" type="hidden" class="col-md-6 form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Nama Kelompok Belajar</label>
                            <input name="nama" placeholder="Masukan Nama Kelompok Belajar" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Jurusan</label>
                            <?php echo combo_dinamis('jurusan','tbl_jurusan','nama_jurusan','kd_jurusan','kd_jurusan',null); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Kelas</label>
                            <select name="kelas" class="form-control">
                                <?php
                                for ($i=1; $i<=$info['jumlah_kelas'] ; $i++) { 
                                    echo "<option value='$i'>Kelas $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>