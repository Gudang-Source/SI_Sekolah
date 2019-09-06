<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-header">FILTER DATA SISWA</div>
            <div class="table-responsive">
            <?php echo form_open('siswa/export_data_excel'); ?>
                <table id="table_didik" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <tr>
                    <td><?php echo combo_dinamis('jurusan','tbl_jurusan','nama_jurusan','kd_jurusan',null,"id='jurusan' onChange='load_kelompok()'") ?></td>
                    </tr>
                    <tr>
                    <td><div id="kelompok" onChange='load_list_siswa()'></div></td>
                    </tr>
                    <tr><td><button class="btn btn-outline-success btn-lg" type="submit">Export Excel</button></td></tr>
                </table>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA SISWA</div>
            <div class="table-responsive">
            <div id="list_siswa"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  $(document).ready(function()
  {
    load_kelompok();
  });
</script>

<script type="text/javascript">
  function load_kelompok() {
    var jurusan =$('#jurusan').val();


    $ .ajax({
      type:'GET',
      url:'<?php echo base_url() ?>index.php/kelompok/list_kelompok_jurusan',
      data:'jurusan='+jurusan,
      success:function(html) {
        $("#kelompok").html(html);
        var kelompok =$('#kelompokII').val();
        load_list_siswa(kelompok);
      }

    })
  }

  function load_list_siswa(kelompok) {
    var kelompok =$('#kelompokII').val();
    $ .ajax({
      type:'GET',
      url:'<?php echo base_url() ?>index.php/siswa/list_siswa_jurusan',
      data:'kelompok='+kelompok,
      success:function(html) {
        $("#list_siswa").html(html);
      }

    }) 
  }
</script>