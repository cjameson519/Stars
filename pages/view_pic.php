<?php
//connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ="SELECT * FROM photos WHERE photo_id='{$_GET['id']}'";
$results = $conn->query($sql);
//loop over results
while(($contact = $results->fetch_assoc()) != null) {
	extract($contact);
	
	?>
	

	<tr>
		<td><h2><?php echo $photo_name; ?></h2></td>
		<td><a href="?p=../actions/bg&id=<?php echo $photo_id?>&bg=yes"><input type="button" value="Set as background!" class="btn btn-small" onclick="document.body.style.cssText+=';background-image: url(upload/<?php $picture ?>.jpg);background-repeat: no-repeat;';"></a>
			<a href="?p=view_pic&id=<?php echo $photo_id?>&bg=no"><input type="button" value="Default background!" class="btn btn-small" onclick="document.body.style.cssText+=';background-image: url(upload/nl.jpg);background-repeat: no-repeat;';"></a>
		<?php 
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$photo_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" class="btn btn-small" id="button" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
	<tr>
		<?php
			$imageName=$_GET['car'];
			if ($handle = opendir('upload/$imageName.jpg')) {
			   $dir_array = array();
			   while (false !== ($file = readdir($handle))) {
			  if($file!="." && $file!=".."){
			$dir_array[] = $file;
			}
			}    
			echo $dir_array[rand(0,count($dir_array)-1)];
			 closedir($handle);
			}
		echo '<img src="upload/' . $imageName . $dir_array[rand(0,count($dir_array)-1)] . '" alt="alt" />';
		?>
	</tr>
<?php }

//close DB
$conn->close();
?>
