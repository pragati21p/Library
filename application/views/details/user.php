<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10 user-info">
			<?php 
				if($array == false){
					echo "<h3> Invalid User Id</h3>";
				}else{
					
					?>
					<div class="row">
						<div class="col-md-12">
							
							<?php $total = ($array['privilege'] == 'gold')?'4':'6' ; ?>
							<p>
								<b >User Id : </b>

								<span style="color: #409425;margin-left: 16px; font-size: 25px;">
									<?php echo $array['public_id']; ?>
								</span>

								<span style="margin-left: 10px;">
									<?php echo $array['privilege']; ?>( <?php echo  $total?> )
								</span><br>
							
								<span style="color: #777;font-size: 15px;">
									<?php echo $array['phone']; ?>|<?php echo $array['email']; ?>
	                            </span>
							
							</p>
							
							<p>
							<b >Address : </b>
							<?php echo $array['address']; ?></p>
							
							
							
						</div>

						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space" style="border: 0.5px solid #000;">
						</div>

						<div class="col-md-12">
							
							<p>
							<b >Credit Left : </b>
							<?php echo $array['credit']; ?></p>

							<p>
							<b >Id Type : </b>
							<?php echo $array['idtype']; ?></p>
							
							<p>
							<b >Id Proof : </b>
							<?php echo $array['idproof']; ?></p>
							
						</div>

						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space"></div>
						<div class="col-md-12 bottom-space" style="border: 0.5px solid #000;">
						</div>

						<div class="col-md-12">

							<p>
							<b >Created at : </b>
							<?php echo $array['created_at']; ?></p>
							
							<p>
							<b >Updated at : </b>
							<?php echo $array['updated_at']; ?></p>

							<?php if( $due != 0 ){ 

								?> 
								<p>
								<b >Due : </b>
								<?php echo $due; ?> <b><span id="update-action" data-id="<?php echo $array['public_id']; ?>" style="color: #af2321; cursor: pointer; " >Update</span></b></p>

								<?php 
							} ?>
							
						</div>

						<div class="col-md-12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Book Id</th>
										<th>Issue Date</th>
										<th>Return Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; 

									if($issueDetails){

										foreach ($issueDetails as $detail) {
										?>

											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $detail['book_id']; ?> </td>
												<td><?php echo $detail['issued_at']; ?> </td>
												<td>

													<?php 
														if($detail['returned_at'] == '0000-00-00 00:00:00'){
															?>
															<a class="btn btn-danger" href="<?php echo base_url('index.php/book_controller/returnBook/'.$detail['id']); ?>">Return</a>
															<?php
														}else{
															echo $detail['returned_at'];  
														}
													?>

												</td>
											</tr>

											<?php
											$i++;
										}
									}else{

										echo "<br><tr>";
										echo "<h4 style='color:#b13f3f'>No Book Issue History</h4>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>

					</div>
					
					<?php
				}

			 ?>


		</div>
		<div class="col"></div>
	</div>
</div>