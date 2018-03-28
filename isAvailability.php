<?php


require_once('require_files/session.inc.php');
require_once('require_files/db.inc.php');

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die("Error on establishing connection");


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{
$isAvail = ($_POST["isAvail"]=="yes")? 1 : 0;
$book_name = is_numeric($_POST["book_name"])? $_POST["book_name"] : NULL;

$query1 = 'UPDATE `book_info` SET isAvailable='.$isAvail.' WHERE book_username='.$_SESSION["user_id"].' AND id='.$book_name;


if($result1 = mysqli_query($connect,$query1))
{


	header('location: '.absolute_path.'yourbook.php');
	exit();



}



	
}else {
	header('location '.absolute_path);
	exit();

}









?>