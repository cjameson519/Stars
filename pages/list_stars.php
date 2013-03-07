<?php 
//make it so you can upload pics and set them as a background with a button
//maybe have usernames and passwords
//have a central space to show off the coolest pics
// have a thumbs up system to count and display the favorite pics
//make a big red button that gives you fatal error
// make table called photos with photo_name photo_id photo_description photo_ext
//EX 1, milky way, decription, .jpg
//make folder to store images and in there have file names be id+ext EX 1.jpg(from above)
// go to http://www.w3schools.com/php/php_file_upload.asp 


?>

<h2>Photos!</h2><p>Click the name to view!</p>
<table class="table">
	<thead>
		<tr>
			<th><a href="?p=list_stars&sort=name">Photo Name</a></th>
			<th>Description</th>
			<th>Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
<?php

if(isset($_GET['sort']) && $_GET['sort'] != '') {
	$orderby = "ORDER BY photo_{$_GET['sort']}";
} else {
	$orderby =  'ORDER BY photo_id';
}

//connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ="SELECT * FROM photos $orderby";
$results = $conn->query($sql);
//loop over results
while(($contact = $results->fetch_assoc()) != null) {
	extract($contact);
	?>
	<tr>
		<td><?php echo "<a href=\"?p=view_pic&id=$photo_id\" method=\"post\">$photo_name</a></td>"; ?>
		<td><?php echo $photo_des;
			echo 	"<td><a href=\"?p=form_edit_pic&id=$photo_id\" class=\"btn btn-small\" ><i class='icon-wrench icon-green'></i></a>";
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$photo_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" class="btn btn-small" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>