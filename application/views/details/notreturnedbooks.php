<div class="container page-view">
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10 col-sm-8">
			<div style="background: #fff;border-radius:6px;padding: 15px;">
			<table id="myTable" class="display">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Book Id</th>
						<th>User Id</th>
						<th>Contact</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if ($array) {
						$i=1;
						foreach ($array as $value) {
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value['book_id']; ?></td>
								<td><?php echo $value['issued_to_id']; ?></td>
								<td><?php echo $value['contact']; ?></td>
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