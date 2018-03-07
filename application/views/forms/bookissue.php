<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-4 col-sm-8">
			<form action="<?php echo base_url('index.php/book_controller/bookIssue'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Book Id" aria-label="Book Id" aria-describedby="basic-addon1" name="bookid">
				</div>
				<br>
				
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="User Id" aria-label="User Id" aria-describedby="basic-addon1" name="userid">
				</div>
				<br>
				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Issue">
				</div>
			</form>
		</div>
		<div class="col"></div>
	</div>
</div>