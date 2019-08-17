<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA SISWA</div>
            <div class="table-responsive">
                <table id="table_siswa" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php echo anchor('siswa/add','<i class="fas fa-user-plus"></i>','class="btn btn-outline-primary"'); ?>
                <?php echo anchor('','<i class="fas fa-undo"></i>','class="btn btn-outline-danger"'); ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        var t = $('#table_siswa').DataTable( {
            "ajax": '<?php echo site_url('siswa/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
            {
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            {
                "data": "nim",
                "width": "120px",
                "sClass": "text-center"
            },
            { "data": "foto"},
            { "data": "nama" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir", "width": "150px" },
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