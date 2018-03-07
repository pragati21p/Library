<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-6 col-sm-8 mid-align">
			<form action="<?php echo base_url('index.php/book_controller/createBook'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>
				<h4><center>Book Entry</center></h4>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Book Name" aria-label="bookname" aria-describedby="basic-addon1" name="bookname" value="<?php echo $this->session->flashdata('data')['bookname']?$this->session->flashdata('data')['bookname']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Writer" aria-label="writer" aria-describedby="basic-addon1" name="writer" value="<?php echo $this->session->flashdata('data')['writer']?$this->session->flashdata('data')['writer']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
					<select class="form-control" placeholder="Zoner" name="zoner">
						<option value="">Select</option>
						<?php 
							if($array){
								foreach ($array as  $value) {
									# code...
									?>
									<option value="<?php echo $value['zoner']; ?>"><?php echo ucwords($value['zoner']); ?></option>
									<?php
								}
							}

						 ?>
					</select>
				</div>
				<br>

				<div class="input-group">
				  <input type="number" class="form-control" placeholder="Copies" aria-label="copies" aria-describedby="basic-addon1" name="copies" value="<?php echo $this->session->flashdata('data')['copies']?$this->session->flashdata('data')['copies']:''; ?>" required>
				</div>
				<br>

				<div class="row">
				 	<div class="col-md-6">
						<label class="checkbox-inline"><input type="checkbox" name="popular" > Popular</label>
				 	</div>
				 </div>
				<br>

				<div class="input-group text-center">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Register">
				</div>

			</form>
		</div>
		<div class="col"></div>
	</div>
</div>