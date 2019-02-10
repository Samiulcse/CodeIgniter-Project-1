<div class="container simple-bottom">
    <div class="page-header">
            <h1>Simple CRUD System <a href="<?php echo base_url() ?>employee" class="btn btn-lg btn-success float-right"> View Employee</a></h1>
    </div>

    <?php if ($this->session->has_userdata('success')) {?>
    <div class="alert alert-primary" role="alert">
        <?php echo $this->session->flashdata('success') ?>
    </div>
    <?php }?>

    <?php if ($this->session->has_userdata('error')) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
    <?php }?>

</div>



<div class="container">
    <div class="card card-default">
        <div class="card-header">
            <h3>Edit Employee</h3>
        </div>

        <?php print_r($employee)?>

        <div class="card-body">
            <?php if (count($employee) > 0) {?>
                <form action="<?php echo base_url('employee/save') ?>" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $employee->emp_fname ?>" id="firstName" name="input_val[emp_fname]" placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="input_val[emp_lname]" placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="input_val[emp_email]" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="emp_pass" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="input_val[emp_address]" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="btn_save" value="Save"></input>
                </form>
            <?php } else {?>
                <h4 class="text-denger">No data....</h4>
            <?php }?>
        </div>
    </div>
</div>
