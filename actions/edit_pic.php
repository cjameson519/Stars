<?php  session_start() ?>
<?php
require('../config/db.php');
require('../lib/functions.php');
//connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//execute query
$sql = "UPDATE photos SET photo_name='{$_POST['photo_name']}', photo_des='{$_POST['photo_des']}' WHERE photo_id='{$_POST['photo_id']}'";
$conn->query($sql);
//close connection
$conn->close();
$_SESSION['message'] = array(
		'type' => 'success',
		'text' => 'Nice Job! *feigns pat on the back*'
);
//redirect
header('Location:../?p=list_stars');
?>