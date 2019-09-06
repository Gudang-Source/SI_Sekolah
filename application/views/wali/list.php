<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">INFO TAHUN AKADEMIK</div>
            <div class="table-responsive">
                <table class=" align-middle mb-0 table table-borderless table-striped table-hover">
                <tr><td width="200px">Tahun Akademik</td><td> : <?php echo tahun_akademik_aktif('tahun_akademik'); ?></td></tr>
                <tr><td width="200px">Semester</td><td> : <?php echo tahun_akademik_aktif('semester_aktif'); ?></td></tr>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('mapel/add','<i class="fas fa-user-plus"></i>','class="btn btn-outline-primary"'); ?>
                <?php echo anchor('','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA WALI KELAS</div>
            <div class="table-responsive">
                <table id="table_wali" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">KELOMPOK</th>
                            <th class="text-center">JURUSAN</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">GURU</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('wali/add','<i class="fas fa-user-plus"></i>','class="btn btn-outline-primary"'); ?>
                <?php echo anchor('','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    function updateWali(id_walikelas) {
    var id_guru =$("#guru"+id_walikelas).val();
        $ .ajax({
          type:'GET',
          url:'<?php echo base_url() ?>index.php/wali/update_wali',
          data:'id_guru='+id_guru+'&id_walikelas='+id_walikelas,
          success:function(html) {
          }

        })
    }
</script>
<script>
    $(document).ready(function() {
        var t = $('#table_wali').DataTable( {
            "ajax": '<?php echo site_url('wali/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
            {
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            {
                "data": "nama_kelompok",
                "width": "150px",
                "sClass": "text-center"
            },
            { "data": "nama_jurusan" },

            { "data": "kelas",
              "sClass": "text-center" },
            { "data": "nama_guru" },
            ]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>