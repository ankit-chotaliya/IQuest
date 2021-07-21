<?php
	session_start();
	session_destroy();
	header('location: https://qualifind.rushilshah.in/');
	exit();
?>