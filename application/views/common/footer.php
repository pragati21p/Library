

	<div style="padding: 20px;"></div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myTable').DataTable();

			$(".error-msg").fadeOut(3000);
			$(".success-msg").fadeOut(3000);
			$("#update-action").click(function(){
				var check = confirm('To Update User, Click Yes.');
				if(check == true){
					var value = $(this).attr('data-id');
					window.location = ('<?php echo base_url("index.php/user_controller/updateUser/"); ?>') + value;
				}
			});
			
		});


	</script>
</body>
</html>