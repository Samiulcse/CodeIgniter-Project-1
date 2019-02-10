	<div class="container simple-bottom">
	    <div class="page-header">
	          <h1>Simple CRUD System <a href="<?php echo base_url()?>employee/add_new_employee" class="btn btn-lg btn-success float-right"> Add New</a></h1>
	    </div>
	</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Employee list</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($employees)>0){?>
                        <?php foreach($employees as $emp){?>
                            <tr>
                                <td><?php echo $emp->emp_id ?></td>
                                <td><?php echo $emp->emp_fname.' '.$emp->emp_lname?></td>
                                <td><?php echo $emp->emp_email ?></td>
                                <td><?php echo $emp->emp_address ?></td>
                                <td>
                                    <img src="<?php echo $emp->emp_image ?>" alt="">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">Update</a>
                                    <a type="button" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
                </table>
        </div>
    </div>
</div>
