<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA mapel</div>
            <div class="table-responsive">
                <table id="table_kelompok" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA KELOMPOK BELAJAR</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('kelompok/add','<i class="fas fa-user-plus"></i>','class="btn btn-outline-primary"'); ?>
                <?php echo anchor('','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        var t = $('#table_kelompok').DataTable( {
            "ajax": '<?php echo site_url('kelompok/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
            {
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            { "data": "nama_kelompok", "sClass": "text-center" },
            { "data": "nama_jurusan" },
            { "data": "kelas", "sClass" : "text-center" },
            { "data": "aksi","width": "75px", "sClass": "text-center" },
            ]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>