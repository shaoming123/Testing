<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url ('assets/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url ('assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.0.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>



</head>  
<body onload="startTime()">
<div class="navbar" >	
	<div class="container-fluid" style="color:white; " >
		<div class="row">
		<h2 style="margin-left:50px; margin-right: 50px; position:relative; font-weight:700;">Blogger<?php echo anchor('Blog/logout', 'Logout', ['class' => 'btn btn-primary', 'style' => 'float:right; ']); ?></h2>
		
	</div>	
</div>

</div>
	<div style="float: right; border: 1px solid white;
	font-size: 30px; padding:5px 10px; border-radius: 20px;
		margin: -10px 30px; color:white;" id="txt"></div>