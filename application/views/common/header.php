<!DOCTYPE html>
<html>
<head>
	<title>Library Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<!-- Optional css -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>
	<div class="wrapper">
		<img src="
		<?php 
		echo base_url('images/bookcase-1867460_1920.jpg'); 
		?>
		">
	</div>
	<div class="sub-wrapper">
		
	</div>
	<?php 
		if($this->session->flashdata('error')){
		?>
			<div class="error-msg">
				<?php
					echo $this->session->flashdata('error');
				?>
			</div>
		<?php
		}

		if($this->session->flashdata('success')){
		?>
			<div class="success-msg">
				<?php
					echo $this->session->flashdata('success');
				?>
			</div>
		<?php
		}
	?>
