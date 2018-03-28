<?php

	require_once('require_files/db.inc.php');
	require_once('require_files/session.inc.php');

	$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error on establishing connection');

	if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
	{

		$query1 = 'DELETE FROM `book_info` WHERE id='.$_GET["q"];
	$result1 = mysqli_query($connect,$query1);
	$query2 = 'DELETE FROM `book_location` WHERE book_id='.$_GET["q"];
	$result2 = mysqli_query($connect,$query2);
	$query3 = 'DELETE FROM `borrower` WHERE book_id='.$_GET["q"];
	$result3 = mysqli_query($connect,$query3);

	header('location: '.absolute_path.'yourbook.php');
	exit();

		
	}else {

		header('location: '.absolute_path);
		exit();

	}
	
	

		



	


?>