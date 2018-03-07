
		<nav class="navbar navbar-expand-lg navbar-light bg-light top-nav">
  <a class="navbar-brand" href="<?php echo base_url('index.php/operator_controller/home'); ?>">Parth Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/book_controller/booklist'); ?>">Books | </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/user_controller/userlist'); ?>">Users | </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/book_controller/addZonePage'); ?>">Add Zone </a>
      </li>
      
    </ul>
    <div class="form-inline my-2 my-lg-0">
    	<!-- Example single danger button -->
      <b><a href="<?php echo base_url('index.php/book_controller/duebooks'); ?>" style="color: #6586c3!important; padding-right: 30px;">Due Books </a></b>
  		<div class="btn-group">
  		  <button type="button" class="btn btn-secondary btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  		    Action
  		  </button>
  		  <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="<?php echo base_url('index.php/user_controller/register'); ?>">Register User</a>
  		    <a class="dropdown-item" href="<?php echo base_url('index.php/book_controller/BookForm'); ?>">New Book</a>
  		    <a class="dropdown-item" href="<?php echo base_url('index.php/book_controller/bookIssueForm'); ?>">Issue Book</a>
  		    <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('index.php/operator_controller/changeoperator'); ?>">Settings</a>
  		    <a class="dropdown-item" href="<?php echo base_url('index.php/operator_controller/logout'); ?>">Logout</a>
  		  </div>
  		</div>
    </div>
  </div>
</nav>