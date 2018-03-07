<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-8 zone-info">
					<div class="row">
						<div class="col-md-12">

							
							<?php 
								if($array == false){
									echo "<h3> No Zone</h3>";
								}else{
									?>
										<span class="table-attr"></span>
										<span class="table-attr">Rack</span>
										<span class="table-attr">Books</span>
										<span class="clearfix"></span>
										<hr>
									<?php
								foreach ($array as $value) {
									# code...
									?>
									<p>
										<a href="<?php echo base_url( 'index.php/book_controller/popularBooks/'.$value['zoner'] ); ?>"><?php echo $value['zoner']; ?></a>
										<a class="table-attr" style="color: #b13f3f;" href="<?php echo base_url( 'index.php/operator_controller/delete/rack/rack_id/'.$value['rack_id'] ); ?>">Delete</a>
										<span class="table-attr"><?php echo $value['rack_id']; ?></span>
										<span class="table-attr"><?php echo $value['totalbooks']; ?></span>
										<span class="clearfix"></span>
										<hr>
									</p>

									<?php
								}

							}

						 ?>	
						</div>


					</div>
					
			


		</div>
		<div class="col"></div>
	</div>
</div>