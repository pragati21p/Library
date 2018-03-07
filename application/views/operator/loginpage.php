<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-4 col-sm-8">
			<form action="<?php echo base_url('index.php/operator_controller/checkoperator'); ?>" method="post">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
				</div>
				<br>
				<div class="input-group">
				  <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="password">
				</div>
				<br>
				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Login">
				</div>
			</form>
		</div>
		<div class="col"></div>
	</div>
</div>
<?php
	

?>
