<section class="content">
  <div class="box">
    <div class="box-header">
      <a href="#modalAddBarang" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>
      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Desa</th>
              <th>Nama Desa</th>
              <th>Kecamatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
    <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->kd_desa ?></td>
        <td><?=$row->nama_desa?></td>
        <td>
          <a href="#modalEditDesa<?php echo $row->kd_desa?>" class="btn btn-primary" data-toggle="modal">
        <i class="fa fa-pencil"></i> Edit
      </a>
            <a class="btn btn-danger" href="<?php echo site_url('Data_control/delete_village/'.$row->kd_desa);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus</a>
         
        </td>
    </tr>

    <?php }
    }
    ?>
          </tbody>
          <tr>
              <th>ID Desa</th>
              <th>Nama Desa</th>
              <th>Kecamatan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
  
 <div id="modalAddBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <?php $attributes = array("name" => "village_form", "id" => "village_form");
            echo form_open("Data_control/submit", $attributes);?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Contact Form</h4>
            </div>
            <div class="modal-body" id="myModalBody">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                </div>
                
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" id="email" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control" id="subject" name="subject" placeholder="Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"><?php echo set_value('message'); ?></textarea>
                </div>

                <div id="alert-msg"></div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-default" id="submit" name="submit" type="button" value="Send Mail" />
                <input class="btn btn-default" type="button" data-dismiss="modal" value="Close" />
            </div>
            <?php echo form_close(); ?>            
             </div>
          </div>
        </div>
}?>

<script type="text/javascript">
$('#submit').click(function() {
    var form_data = {
        name: $('#name').val(),
        email: $('#email').val(),
        subject: $('#subject').val(),
        message: $('#message').val()
    };
    $.ajax({
        url: "<?php echo site_url('modal_contact/submit'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES')
                $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
            else if (msg == 'NO')
                $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
            else
                $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
        }
    });
      return false;
  });
</script>
 
<!-- /=======================================================================================/ -->
