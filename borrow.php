<?php


require_once('require_files/db.inc.php');
require_once('require_files/session.inc.php');

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('error in establishing connection');



if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


	$borrower = mysqli_real_escape_string($connect,$_POST["borrower"]);
$book_id = (is_numeric($_POST["book_id"]))? $_POST["book_id"] : NULL;

$query1 = 'SELECT id FROM user WHERE electronics_mail="'.$borrower.'"';
$result1 = mysqli_query($connect,$query1);
if(mysqli_num_rows($result1)==1)
{

	$row1 = mysqli_fetch_array($result1);

	$query2 = 'UPDATE `borrower` SET borrower_id='.$row1["id"].' WHERE book_id='.$book_id;

	if($result3 = mysqli_query($connect,$query2))
	{

		header('location: '.absolute_path.'yourbook.php');
		exit();


	}




		




}
	

}else {
	header('location:'.absolute_path);
  	exit();
}





?>