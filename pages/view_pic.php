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
		<td><h2>Name: <?php echo $photo_name; ?></h2></td>
		<td><p>Description: <?php echo $photo_des; ?></p></td>
		
		<?php echo '<img id=floatimg src="upload/' . "$photo_ext" . '" alt="picture of space" />'; ?>
		
		<td><a href="?p=view_pic&id=<?php echo $photo_id?>"><input type="button" value="Set as background!" class="btn btn-small" onclick="document.body.style.cssText+=';background-image: url(upload/ . <?php $photo_ext ?>.jpg);background-repeat: no-repeat;';"></a>
			<a href="?p=view_pic&id=<?php echo $photo_id?>"><input type="button" value="Default background!" class="btn btn-small" onclick="document.body.style.cssText+=';background-image: url(upload/nl.jpg);background-repeat: no-repeat;';"></a>
		</td>
		<td>
		<?php 
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$photo_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" class="btn btn-small" id="bon" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
<?php }

//close DB
$conn->close();
?>
