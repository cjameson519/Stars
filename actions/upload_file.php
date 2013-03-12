<?php  session_start() ?>
<?php

require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

// Extract POST data to variables
extract($_POST);

$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 20000)
		&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],
					"../upload/" . $_FILES["file"]["name"]);
			echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
		}
	}
}
else
{
	echo "Invalid file";
}

$required = array(
	'photo_name',
	'photo_des',
);

// At this point, as a result of 'extract', we can
// refer to, for example, the submitted last name as
// $contact_lastname instead of $_POST['contact_lastname']
foreach($required as $r) {
	if(!isset($_POST[$r]) || $_POST[$r] == ''){
		$_SESSION['message'] = array(
		'type' => 'danger',
		'text' => 'You are a bad man!'
		);
		$_SESSION['POST'] = $_POST;
		header('Location:../?p=form_add_pic');
		die();	
	}
}

// echo '<pre>';	
// print_r($_FILES);
// echo '</pre>';
// die();


$file_name = $_FILES["file"]["name"];

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute query
$sql = "INSERT INTO photos (photo_name,photo_des,photo_ext) VALUES ('$photo_name','$photo_des','$file_name')";
$conn->query($sql);
  
  $_SESSION['message'] = array(
  		'type' => 'success',
  		'text' => 'You`ve done it Watson!'
  );
  
  // Close DB connection
  $conn->close();
  // Redirect to list
  header('Location:../?p=list_stars');
?>