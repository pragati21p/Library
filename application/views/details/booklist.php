<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10 col-sm-8">
			<div style="background: #fff;border-radius:6px;padding: 15px;">

				<?php if( !isset($title)) $title = 'Books'; ?>
				<h1 class="h-adjust" style="text-align: center;"><?php echo $title; ?></h1>
				<br>
				<table id="myTable" class="display">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Book Id</th>
							<th>Name</th>
							<th>Zoner</th>
							<th>Available Since</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($array) {
							# code...
							$i=1;
							foreach ($array as $value) {
								# code...
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><a href="<?php echo base_url('index.php/book_controller/bookPage/'.$value['public_id']); ?>"><?php echo $value['public_id']; ?></a></td>
									<td><?php echo $value['bookname']; ?></td>
									<td><?php echo $value['zoner']; ?></td>
									<td><?php echo $value['available_since']; ?></td>
								</tr>
								<?php
								$i++;
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>