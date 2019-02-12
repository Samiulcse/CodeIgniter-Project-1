<div class="container simple-bottom">
    <?php if ($this->session->has_userdata('success')) {?>
    <div class="alert alert-primary" role="alert">
        <?php echo $this->session->flashdata('success') ?>
    </div>
    <?php }?>

    <?php if ($this->session->has_userdata('error')) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
    <?php 
print_r($data);

}?>

</div>
<div class="container">
  <div class="row">
       <div class="col-md-12">
        <ul class="nav nav-tabs justify-content-end" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#password" role="tab">Password</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" style="padding-top:20px;">
            <div class="tab-pane active" id="profile" role="tabpanel">

        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <p class="form-control-static"><?php echo $profile[0]->user_name ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <p class="form-control-static"><?php echo $profile[0]->user_email ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
            <p class="form-control-static">
                <?php
if ($profile[0]->user_type == '1') {
    echo 'Administrator';
} else {
    echo 'Normal User';
}
?>
            </p>
            </div>
        </div>
        <form method="POST" id="upload_form" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Profile</label>
                <div class="col-sm-2">
                    <p class="form-control-static">
                        <img class="img-fluid img-thumbnail" id="profileimg" src="<?php echo base_url().'upload/'.$profile[0]->user_profile ?>" alt="">
                    </p>
                    <input type="file" class="form-control-file" name="image_file" id="image_file" accept="image/*" onchange="loadFile(event)">
                    <input type="hidden" id="user_id" name="user_id" value=<?php echo $profile[0]->user_id;?>>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-2">
                    <input type="submit" value="Update Image" class="btn btn-primary" id="UpdateProfileImage">
                </div>
            </div>
        </form>

        <div id="uploaded_image"></div>
        </div>
        <div class="tab-pane " id="password" role="tabpanel">
            <form action="<?php echo base_url() ?>profile/passwordUpdate" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="current_pass" placeholder="Current password">
                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $profile[0]->user_id; ?>">
                    <span class="text-danger"><?php echo form_error('current_pass'); ?></span>
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="new_pass" placeholder="New password">
                        <span class="text-danger"><?php echo form_error('new_pass'); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Upadate" name="btn_update_pass">
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<hr>
</div>


<script>
    function loadFile(event) {
    var output = document.getElementById('profileimg');
    output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function () {
    $('#upload_form').on('submit', function(e){  
        var id=$('#user_id').val();
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url() ?>profile/do_upload/"+id,   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          location . reload();  
                     }  
                });  
           }  
      });
}); 

</script>
