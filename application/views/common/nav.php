<body>
	<div class="container">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="nav-content">
		    <a class="navbar-brand" href="#">CODEIGNITER CRUD SYS</a>
		    <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		    </ul> -->
		    <div class="collapse navbar-collapse justify-content-end" id="nav-content">
		    <ul class="navbar-nav">
		        <li class="nav-item ">
            <a class="nav-link <?php if (uri_string() == 'employee') {
    echo 'active';
}
?>" href="<?php echo base_url('employee') ?>">Employee</a>
          </li>
                    <li class="nav-item ">
            <a class="nav-link <?php echo (uri_string() == 'article') ? 'active' : ''?>" href="<?php echo base_url('article') ?>">Article</a>
          </li>
                    <li class="nav-item ">
            <a class="nav-link" href="http://localhost/codeigniter_crud_system_demo/admin/image">Image</a>
          </li>
          <li class="nav-item <?php if (uri_string() == 'profile') {
    echo 'active';
}
?>">
            <a class="nav-link" href="<?php echo base_url() ?>profile">Profile</a>
          </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url() ?>logout">Log Out</a>
		      </li>
		    </ul>
		    </div>
		  </div>
		</nav>
	</div>