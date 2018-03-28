<?php


require_once('require_files/db.inc.php');
require_once('require_files/session.inc.php');

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error on establishing connection');


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


	$query1 = 'SELECT * FROM user WHERE id='.$_SESSION["user_id"];
$result1 = mysqli_query($connect,$query1);
$row1 = mysqli_fetch_array($result1);
$query2 = 'SELECT * FROM profiles WHERE user_name='.$_SESSION["user_id"];
$result2 = mysqli_query($connect,$query2);
$row2 = mysqli_fetch_array($result2);


?>
<!doctype html>
  <html>
  <head>
   <title>Libro - book sharing application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet"/>
 </head>
 <body>
 	<?php

 			require_once('require_files/loginHeader.inc.php');

 	?>
 	<div class="container">
 		<div class="text-right">
 		<a href="<?php echo absolute_path.'Edit.php'; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a>
 	</div>

 	<div class="text-center thumbnail" style="border:0px;">
		<img style="width:300px;" class="thumbnail" src="<?php echo image_file_path.$row2['pic']; ?>" alt="image">
	</div>


<div class="text-center">
		<p><strong>Name:</strong></p>
	<p><?php echo $row1["user_name"]; ?></p>

		<p><strong>E-mail:</strong></p>
		<p><?php echo $row1["electronics_mail"]; ?></p>

</div>

 	</div>
 	



 </body>
 </html>

	
<?php
}else {

	header('location: '.absolute_path);
	exit();


}


?>
