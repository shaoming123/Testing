
<?php include_once('header.php');?>
<?php $idd = $_REQUEST['idd']; ?>
<div class="container color-custom" >
	<h3>Edit Post</h3>
	<?php echo form_open("Blog/change/{$post->id}", ['class' => 'form-horizontal']); ?>
	
	
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">Title</label>
			<div class="col-md-10">
				
				<?php echo form_input(['name'=>'Title','class'=>'form-control', 'value' => set_value('Title',$post->Title)]); ?><br>
				
				<?php echo form_error('Title', '<div> class="text-danger">', '</div>'); ?>
				
			</div>

		</div>
		
		<br /><br>
		<div class="form-group">
			<label for="title" class="col-md-2 control-label ">Description</label>
			<div class="col-md-10">
				
				<?php echo form_textarea(['name'=>'Description','class'=>'form-control', 'value' => set_value('Description',$post->Description)]);?>
				<br>
				<?php echo form_error('Description', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>


		<div class="form-group">
			<label for="title" class="col-md-2 control-label ">Select Image</label>
			<div class="col-md-10">
				
				<input type="file" name="file_name" class="form-control" value="<?php echo $post->file_name;?>">
				<br>
				<?php echo form_error('file_name', '<div class="text-danger">', '</div>'); ?>
	
					<img src="<?php echo base_url('uploads/'.$post->file_name);?>" style="width:70px; height:70px;">

			<input type="text" name="idd" value="<?php echo $idd;?>" style="visibility: hidden; position: absolute;" />
			
			</div>
		</div>



		
		

		<div class="form-group">
			
			<div class="col-md-10 col-md-offset-2">

			<br><br>
		
				<?php echo form_submit(['name'=>'submit', 'value'=>'Update', 'class'=>'btn btn-primary ']); ?>
				<?php echo anchor("blog/index?idd=".$idd,'Back',['class'=>'btn btn-default']); ?>
			</div>
		</div>

	<?php echo form_close(); ?>
	

</div>
<?php include_once('footer.php');?>
 