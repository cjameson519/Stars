<?php
$_SESSION['message'] = array(
		'type' => 'danger',
		'text' => 'Why! Why! You Animal!',
		'bg' => "document.body.style.cssText+=';background-image: url(upload/nl.jpg);background-repeat: no-repeat;';"
);
header('Location:./?p=list_stars');