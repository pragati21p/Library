<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10 col-sm-8">
			<div style="background: #fff;border-radius:6px;padding: 15px;">
				<h1 style="text-align: center;">Users</h1>
				<br>
				<table id="myTable" class="display">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>User Id</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Privilege</th>
							<th>Due</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach ($array as $value) {
							# code...
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><a href="<?php echo base_url('index.php/user_controller/userPage/'.$value['public_id']); ?>"><?php echo $value['public_id']; ?></a></td>
								<td><?php echo $value['username']; ?></td>
								<td><?php echo $value['phone']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['privilege']; ?></td>
								<td><?php echo $value['due']; ?></td>
							</tr>
							<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>