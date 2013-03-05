<?php  session_start() ?>
<?php

require('../config/db.php');
require('../config/app.php');
require('../lib/functions.php');

$required = array(
	'photo_name',
	'photo_des',
);
// Extract POST data to variables
extract($_POST);

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
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute query
$sql = "INSERT INTO photos (photo_name,photo_des,photo_ext) VALUES ('$photo_name','$photo_des','$photo_ext')";
$conn->query($sql);

// Close DB connection
$conn->close();
$_SESSION['message'] = array(
		'type' => 'success',
		'text' => 'You`ve done it Watson!'
);
// Redirect to list
header('Location:../?p=list_stars');