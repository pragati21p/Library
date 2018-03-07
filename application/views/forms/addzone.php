<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-4 col-sm-8">
			<form action="<?php echo base_url('index.php/book_controller/addzone'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>

				<label class="bottom-space">Zone</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Zone" aria-label="zoner" aria-describedby="basic-addon1" name="zoner">
				</div>
				<br>

				<label class="bottom-space">Rack Id</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Id" aria-label="rackid" aria-describedby="basic-addon1" name="rackid">
				</div>
				<br>
				
				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Add Zone">
				</div>
			</form>

		</div>
		<div class="col"></div>
	</div>
</div>