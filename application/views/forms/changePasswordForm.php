<div class="container page-view">
	<h2 style="text-align: center;color: #fff;">Change Operator</h2>
	<br>
	<div class="row">
		<div class="col"></div>
		<div class="col-md-4 col-sm-8">
			<form action="<?php echo base_url('index.php/operator_controller/updateUsername'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>

				<label class="bottom-space">Old Username</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Name" aria-label="oldusername" aria-describedby="basic-addon1" name="oldusername" value="<?php echo $this->session->flashdata('user')['oldusername']?$this->session->flashdata('user')['oldusername']:''; ?>"	 required>
				</div>
				<br>
				
				<label class="bottom-space">New Username</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Name" aria-label="newusername" aria-describedby="basic-addon1" name="newusername" value="<?php echo $this->session->flashdata('user')['newusername']?$this->session->flashdata('user')['newusername']:''; ?>"	 required>
				</div>
				<br>

				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Change">
				</div>
			</form>
		</div>
		<div class="col"></div>
		<div class="col-md-4 col-sm-8">


			<form action="<?php echo base_url('index.php/operator_controller/updatePassword'); ?>" method="post" class="set-form">

				<div class="blur-back"></div>
				
				<label class="bottom-space">Old Password</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Password" aria-label="oldpassword" aria-describedby="basic-addon1" name="oldpassword" value="<?php echo $this->session->flashdata('data')['oldpassword']?$this->session->flashdata('data')['oldpassword']:''; ?>"	 required>
				</div>
				<br>

				<label class="bottom-space">New Password</label>
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Enter Password" aria-label="newpassword" aria-describedby="basic-addon1" name="newpassword" value="<?php echo $this->session->flashdata('data')['newpassword']?$this->session->flashdata('data')['newpassword']:''; ?>"	 required>
				</div>
				<br>
				
				<div class="input-group">
				  <input type="submit" class="form-control btn btn-primary" aria-describedby="basic-addon1" value="Change">
				</div>
			</form>
		</div>
		<div class="col"></div>
	</div>
</div>