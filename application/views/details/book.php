<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10 user-info">
			<?php 
				if($array == false){
					echo "<h3> Invalid Book Id</h3>";
				}else{
					
					?>
					<div class="row">
						<div class="col-md-12">
							
							<?php 

								if($array['popular'] == '1'){
									?>
									<div class="badge badge-danger" style="position: absolute;right: 15px;padding:9px;border-radius:30px;cursor: pointer;">Popular</div>
									<?php
								}
							 ?>
							<p>
								<b >Book Id : </b>

								<span style="color: #409425;margin-left: 16px; font-size: 25px;">
									<?php echo $array['public_id']; ?>
								</span>

								<span style="margin-left: 10px;">
									<?php echo $array['zoner']; ?>
								</span><br>
							
								<span style="color: #777;font-size: 15px;">
									<?php echo $array['writer']; ?>|
	                            </span>
							
							</p>
							
							<p>
							<b >Book : </b>
							<?php echo $array['bookname']; ?></p>
							
							
							
						</div>

						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space" style="border: 0.5px solid #000;">
						</div>

						<div class="col-md-12">
							
							<p>
							<b >Number of Copies : </b>
							<?php echo $array['copies']; ?></p>
							
							<p>
							<b >Available Copies : </b>
							<?php echo $array['available']; ?></p>

							<p>
							<b >Available Since : </b>
							<?php echo $array['available_since']; ?></p>

						</div>

						

					</div>
					
					<?php
				}

			 ?>


		</div>
		<div class="col"></div>
	</div>
</div>