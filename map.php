<?php
require_once("require_files/db.inc.php");
require_once("require_files/session.inc.php");

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('error on establishing connection');


$dom = new DOMDocument("1.0");
$node = $dom->createElement("books");
$parnode = $dom->appendChild($node);

if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{

$book_name = mysqli_real_escape_string($connect,$_GET["q"]);



$query1 = 'SELECT * FROM book_info WHERE book_author="'.$book_name.'" OR '.'book_name="'.$book_name.'"';
$result1 = mysqli_query($connect,$query1);
// $row2 = mysqli_fetch_array($result1);








header("Content-type: text/xml");



while ($row1 = mysqli_fetch_array($result1)){
  
  $node = $dom->createElement("book");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("book-name",$row1['book_name']);
  $newnode->setAttribute("book-author",$row1['book_author']);
  $newnode->setAttribute("book-edition",$row1['book_edition']);
  $newnode->setAttribute("rent-days",$row1['rent_days']);

$query2 = 'SELECT * FROM user WHERE id='.$row1["book_username"];
$result2 = mysqli_query($connect,$query2);

$query3 = 'SELECT * FROM book_location WHERE book_id='.$row1["id"];
$result3 = mysqli_query($connect,$query3);



		while($row2 = mysqli_fetch_array($result2))
		{


			$newnode->setAttribute("email",$row2['electronics_mail']);
			$newnode->setAttribute("username",$row2['user_name']);

		}


		while($row3 = mysqli_fetch_array($result3))
		{


			$newnode->setAttribute("lat",$row3['latitude']);
			$newnode->setAttribute("lng",$row3['longitude']);
			$newnode->setAttribute("city",$row3['city']);
			$newnode->setAttribute("address",$row3['address']);
			$newnode->setAttribute("street",$row3['route']);
			$newnode->setAttribute("state",$row3['state']);
			$newnode->setAttribute("city",$row3['city']);




		}



}

echo $dom->saveXML();

}else {
	header('location: '.absolute_path);
	exit();
}


?>