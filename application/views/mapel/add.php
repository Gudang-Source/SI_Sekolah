<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Mata Pelajaran</h5>
                <?php echo form_open('mapel/add','role="form"'); ?>
                <div class="position-relative form-group"><label class="">ID Mata Pelajaran</label>
                    <input name="id" placeholder="Masukan ID" type="text" class="col-md-6 form-control">
                </div>
                <div class="position-relative form-group"><label class="">Nama Mata Pelajaran</label>
                    <input name="nama" placeholder="Masukan Nama Mata Pelajaran" type="text" class="form-control col-md-6">
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>