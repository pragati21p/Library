<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-4 col-sm-8 mid-align">
			<form action="<?php echo base_url('index.php/user_controller/registerUser'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?php echo $this->session->flashdata('data')['username']?$this->session->flashdata('data')['username']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="basic-addon1" name="phone" value="<?php echo $this->session->flashdata('data')['phone']?$this->session->flashdata('data')['phone']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email" value="<?php echo $this->session->flashdata('data')['email']?$this->session->flashdata('data')['email']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="basic-addon1" name="address" value="<?php echo $this->session->flashdata('data')['address']?$this->session->flashdata('data')['address']:''; ?>" required>
				</div>
				<br>

				<?php 
					$gold = 1;
					$platinum = 0;
					if(isset($this->session->flashdata('data')['privilege'])){
						$this->session->flashdata('data')['privilege']=='gold'?($gold = 1):'';
						$this->session->flashdata('data')['privilege']=='platinum'?($platinum = 1):'';
					}
				 ?>

				 <div class="row">
				 	<div class="col-md-6">
						<label class="radio-inline"><input type="radio" name="privilege" value="gold" <?php echo $gold?'checked':''; ?> > Gold</label>
				 	</div>
				 	<div class="col-md-6">
						<label class="radio-inline"><input type="radio" name="privilege" value="platinium" <?php echo $platinum?'checked':''; ?> > Platinum</label>
				 	</div>
				 </div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Id Type" aria-label="Mobile Number" aria-describedby="basic-addon1" name="idtype" value="<?php echo $this->session->flashdata('data')['idtype']?$this->session->flashdata('data')['idtype']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Id Proof" aria-label="Id Proof" aria-describedby="basic-addon1" name="idproof" value="<?php echo $this->session->flashdata('data')['idproof']?$this->session->flashdata('data')['idproof']:''; ?>" required>
				</div>
				<br>

				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Register">
				</div>

			</form>
		</div>
		<div class="col"></div>
	</div>
</div>