<div class="row">
    <div class="col-md-5">
        <div class="main-card mb-3 card">
            <div class="card-header">filter DATA</div>
            <div class="table-responsive">
                <table id="table_kurikulum" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <tr>
                        <td>Jurusan</td>
                        <td><?php echo combo_dinamis('jurusan','tbl_jurusan','nama_jurusan','kd_jurusan',null,"id='jurusan' onChange='load_data()'"); ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>
                            <select id="kelas" class="form-control" onChange="load_data()">
                            <?php
                            for ($i=1; $i<=$info['jumlah_kelas'] ; $i++) { 
                                echo "<option value='$i'>Kelas $i</option>";
                            }
                             ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('kurikulum/addDetail','<i class="fas fa-user-plus"></i>','class="btn btn-outline-primary"'); ?>
                <?php echo anchor('kurikulum','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA Mata Pelajaran</div>
            <div class="table-responsive">
                <div id="table"></div>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('kurikulum','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        load_data();
    });
</script>
<script type="text/javascript">
    function load_data() {
        var kelas=$('#kelas').val();
        var jurusan=$('#jurusan').val();

        $.ajax({
            type:'GET',
            url:'<?php echo base_url() ?>index.php/kurikulum/kurikulumDetail',
            data:'jurusan='+jurusan+'&kelas='+kelas,
            success:function(html) {
                $("#table").html(html);
            }

        })
    }
</script>
