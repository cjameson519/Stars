<h2>Edit!</h2>
<?php 
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


// Execute SELECT query
$sql = "SELECT * FROM photos WHERE photo_id={$_GET['id']}";
$results = $conn->query($sql);

// Store the contact date
$contact = $results->fetch_assoc();
extract($contact);

// Close the connection
$conn->close();

?>
<form action="./actions/edit_pic.php" method="post">
	<label>Photo Name</label>
	<input type="text" name="photo_name" value="<?php echo $photo_name ?>" />
	<br/>

	<label>Description</label>
	<input type="text" name="photo_des" value="<?php echo $photo_des ?>" />
	<br/>
	
	<input type="hidden" name="photo_id" value="<?php echo $_GET['id'];?>"/>
	<input type="submit" value="Edit!" />
</form>


