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
		<td><?php echo $photo_name; ?></td>
		<td><?php 
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$photo_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" class="btn btn-small" id="button" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
	<tr>
		<?php
		$file=fopen("upload/chris.jpg","r");
		?>
	</tr>
<?php }
//close DB
$conn->close();
?>
