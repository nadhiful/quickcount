<section class="content">
  <div class="box">
    <div class="box-header">
      <a href="#modalAddDistrict" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Desa</th>
              <th>Nama Kecamatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
    <?php
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->kd_kecamatan ?></td>
        <td><?=$row->nama_kecamatan?></td>
        <td>
          <a href="#modalEditKecamatan<?php echo $row->kd_kecamatan?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Edit
      </a>
            <a class="btn btn-danger" href="<?php echo site_url('Master/delete_district/'.$row->kd_kecamatan);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
         
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
              <th>ID Desa</th>
              <th>Nama Kecamatan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
  
 <div id="modalAddDistrict" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <?php $attributes = array("name" => "district_form", "id" => "district_form");
            echo form_open("master/add_district", $attributes);?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Form Kecamatan</h4>
            </div>
            <div class="modal-body" id="modalAddDistrict">
                <div id="alert-msg"></div>
                <div class="form-group">
                    <label for="name">ID Kecamatan</label>
                    <input class="form-control" id="kd_kecamatan" name="kd_kecamatan" placeholder="Kode Kecamatan" type="text" value="<?php echo $id_kecamatan; ?>" readonly />
                </div>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="nama" name="nama" placeholder="Nama Kecamatan" type="text" value="<?php echo set_value('nama'); ?>" />
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-default" id="submit" name="submit" type="button" value="Save" onclick="style.display='none'" />
                <input class="btn btn-default" type="button" data-dismiss="modal" value="Close" onclick="window.location.reload()" />
            </div>
            <?php echo form_close(); ?>            
             </div>
          </div>
        </div>
<!-- Modal Edit Kecamatan-->
 <?php
if (isset($data)){
    foreach($data as $row){ 
        ?>
  <div id="modalEditKecamatan<?php echo $row->kd_kecamatan?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <?php $attributes = array("name" => "edit_form", "id" => "edit_form");
            echo form_open("master/update_district", $attributes);?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Kecamatan</h4>
            </div>
            <div class="modal-body" id="modalAddDistrict">
                 <div id="alert-msg"></div>
                <div class="form-group">
                    <label for="name">ID Kecamatan</label>
                    <input class="form-control" id="id_kecamatan" name="id_kecamatan" placeholder="Kode Kecamatan" type="text" value="<?php echo $row->kd_kecamatan;?>" readonly />
                </div>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="kd_nama" name="kd_nama" placeholder="Nama Kecamatan" type="text" value="<?php echo $row->nama_kecamatan?>" />
                </div>
            </div>
            <div class="modal-footer">
              <input class="btn btn-default" id="submit" name="submit" type="button" value="Save" onclick="" />
              <input class="btn btn-default" type="button" data-dismiss="modal" value="Close" onclick="window.location.reload()" />
             </div>
            <?php echo form_close(); ?>            
             </div>
          </div>
        </div>
<?php }
}?>
<!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('asset/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>

<script type="text/javascript">

  $('#submit').click(function() {
    var form_data = {
        kd_kecamatan: $('#kd_kecamatan').val(),
        nama: $('#nama').val()
    };
    $.ajax({
        url: "<?php echo site_url('master/add_district'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES')
                $('#alert-msg').html('<div class="alert alert-success text-center">Data has been saved successfully!</div>');
            else if (msg == 'NO')
                $('#alert-msg').html('<div class="alert alert-danger text-center">Error in save your data! Please try again later.</div>');
            else
                $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
        }
    });
      // return false;
  });
</script>


<script type="text/javascript">
$('#submit').click(function() {
    var form_data = {
        id_kecamatan    : $('#id_kecamatan').val(),
        kd_nama         : $('#kd_nama').val()
    };
    $.ajax({
        url: "<?php echo site_url('master/update_district/'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES')
                $('#alert-msg').html('<div class="alert alert-success text-center">Data has been saved successfully!</div>');
            else if (msg == 'NO')
                $('#alert-msg').html('<div class="alert alert-danger text-center">Error in save your data! Please try again later.</div>');
            else
                $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
        }
    });
      return false;
  });


</script>