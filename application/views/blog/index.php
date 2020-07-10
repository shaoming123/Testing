
<?php include_once('header.php'); ?>
	<?php $idd = $_REQUEST['idd']; ?>
<div class="container-fluid color-custom">
	<h3 style="font-weight:500;">Blog List</h3>
	<?php echo anchor('blog/add?idd='.$idd, 'Add Post', ['class' => 'btn btn-primary']); ?>
	<?php if($msg = $this->session->flashdata('msg')): ?>
	<?php echo $msg; ?>
	<?php endif;?>

	<br><br>
	<table class="table table-bordered table-reponsive text-center" style="width:100%;">
		<thead >	
		<div class="row" >
			<tr style="border:1px solid white">
				<div class="col-md-4"  >	
				<td style="border:2px solid white; font-size:30px;">Picture</td>
				</div>
				<div class="col-md-5 des" >
				<td style="border:2px solid white; font-size:30px;">Description</td>	
				</div>
				<div class="col-md-2" >
				<td style="border:2px solid white; font-size:15px;">Creation Date / Time</td>	
				</div>
				<div class="col-md-1" >
				<td style="border:2px solid white; font-size:15px;">Action</td>	
				</div>
		
			</tr>
		</div>
		</thead>
		<tbody >
			<?php 


			 ?>
			<?php if(count($posts)): ?>

			<?php foreach ($posts as $post): ?> 
				
			<div class="row">
			<tr style="border-bottom: 2px solid white;">
				<div class="col-md-4 ">
				<td><img src="<?php echo base_url('uploads/'.$post->file_name);?>" style="width: 300px; height: 280px; padding: 0;" alt=""></td>
				</div>
				<div class="col-md-5 des" >				
						<td><h3><?php echo $post->Title;?></h3><br>
						<?php echo $post->Description;?></td>
				
				</div>
				<div class="col-md-2 ">
				<td>
					<?php echo $post->date_created;?>
					
					 
				</td>				
				</div>
				<div class="col-md-1">
				<td>

				<?php 
				if ($idd == $post->id_user){
				echo anchor("blog/update/{$post->id}?idd=".$idd, 'Edit', ['class' => 'label label-success']);
				?>
				<?php echo anchor("blog/delete/{$post->id}?idd=".$idd, 'Delete', ['class' => 'label label-danger'],
					);
				} 
				?>
				</td>
				</div>
			</tr>
		</div>
	<?php endforeach; ?>
		<?php else: ?>
			<tr>
			<td>No Records Found!</td>
			</tr>
		 <?php endif; ?>

		</tbody>
	</table>

</div>
<?php include_once('footer.php'); ?>
