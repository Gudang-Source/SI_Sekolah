<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Input Data Users</h5>
                <?php echo form_open_multipart('users/add','role="form"'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Nama User</label>
                            <input name="nama" placeholder="Masukan Nama Lengkap" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Email / Username</label>
                            <input name="username" placeholder="Masukan Email" type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="">Password</label>
                            <input name="password" placeholder="Masukan Password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Level User</label>
                            <?php echo combo_dinamis('level','tbl_level_user','nama_level','id_level_user','id_level_user',null); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Foto User</label>
                            <input class="form-control" type="file" name="userfile"></input>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>