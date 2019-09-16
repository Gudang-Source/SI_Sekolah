<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-header">Level</div>
            <div class="table-responsive">
                <table id="table_users" class=" align-middle mb-0 table table-borderless table-striped table-hover">
                    <tr>
                        <td>
                            <div><?php echo combo_dinamis('level','v_user','nama_level','id_level_user',null,"id='level_user' onChange='load_data()'"); ?></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="d-block text-center card-footer">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-header">Users Access</div>
            <div class="table-responsive">
                <div id="table"></div>
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
    var level_user = $("#level_user").val();
    $ .ajax({
      type:'GET',
      url:'<?php echo base_url() ?>index.php/Users/modul',
      data:'level_user='+level_user,
      success:function(html) {
        $("#table").html(html);
      }

    })
  }

  function check_akses(id_menu) {
    var level_user = $("#level_user").val();
    $ .ajax({
      type:'GET',
      url:'<?php echo base_url() ?>index.php/Users/rule',
      data:'level_user='+level_user+'&id_menu='+id_menu,
      success:function(html) {
        alert('Success');        
      }

    }) 
  }
  </script>