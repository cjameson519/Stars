<?php 
//require('./lib/functions.php'); 
?>
<h2>Add a Picture!</h2>
<form class="form-horizontal" action="actions/add_pic.php" method="post">
	<div class="control-group">
		<label class="control-label" for="photo_name">Name!</label>
		<div class="controls">
			<?php echo input('photo_name','required')?>
		</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="photo_des">Description!</label>
		<div class="controls">
			<?php echo input('photo_des','required')?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="photo_ext">File type</label>
		<div class="controls">
			<?php echo input('photo_ext','Ex .jpg')?>
		</div>
	</div>
	<form action="./actions/upload_file.php" method="post"
		enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
<?php //form submission methods, use $_GET or $_POST, $_GET you use when submitting something wont change the server state, $_Post you use if you are changing the Server?>
	<div class="form-actions">
		<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Add Picture!</button>
		<a href="./?p=list_stars"><button type="button" class="btn">Cancel</button></a>
	</div>
</form>
</form>	