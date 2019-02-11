
<body>
        <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5 offset-md-4">
                <div class="card card-primary">
                    <div class="card-body">
                        <h4 class="text-primary text-center">LOGIN FORM</h4>
                        <hr>
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>login/login_validation">
                        <?php echo $this->session->flashdata('error')?>
                            <div class="col-md-12">
                                <div class="form-group has-danger">
                                    <label class="sr-only" for="email">E-Mail Address</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="Email" required autofocus>
                                        <span class="text-danger"><?php echo form_error('email');?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="Password" required>
                                        <span class="text-danger"><?php echo form_error('email');?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" name="btn_login" class="btn btn-lg btn-primary btn-block" value="Sign in">
                            <!-- <div class="text-center">
                                <a href="#">Create account</a> or <a href="#">reset password</a>
                            </div> -->
                        </form>
                    </div>
                </div>
                </div>
                </div>
        </div>
</body>
