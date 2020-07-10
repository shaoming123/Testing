
<?php include_once('header.php');?>
<?php $idd = $_REQUEST['idd']; ?>
<div class="container color-custom" >
	<h3>Add Blog</h3>
	<?php echo form_open_multipart('Blog/save', ['class' => 'form-horizontal']); ?>

	
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">Title</label>
			<div class="col-md-10">
				
				<?php echo form_input(['name'=>'Title','class'=>'form-control']); ?>
				<?php echo form_error('Title', '<div class="text-danger">', '</div>'); ?>
				
	</div>

	</div>
			
		<br />
		<div class="form-group">
			<label for="title" class="col-md-2 control-label ">Description</label>
			<div class="col-md-10">
				
				<?php echo form_textarea(['name'=>'Description','class'=>'form-control']);?>
				
				<?php echo form_error('Description', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>
		<br>

			<div class="form_group">
				<div class="row">
					<label for="image" class="col-md-2 control-label ">Select Image</label>
					<div class="col-md-10">
				
					
					<?php echo form_upload(['name'=>'file_name','class'=>'form-control']);?>
					<?php echo form_error('file', '<div class="text-danger">', '</div>'); ?>
					
			
		</div>
		</div>
		
		
				<input type="text" name="idd" value="<?php echo $idd;?>" style="visibility: hidden; position: absolute;" />
	

		<div class="form-group">
			
			<div class="col-md-10 col-md-offset-2">

			<br>
		
				<?php echo form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary ']); ?>
				<?php echo anchor("blog/index?idd=".$idd ,'Back',['class'=>'btn btn-default']); ?>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
	

</div>
<?php include_once('footer.php');?>
 