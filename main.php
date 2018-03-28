<?php


require_once('require_files/session.inc.php');
require_once('require_files/db.inc.php');


$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error on establishing connection');


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Libro - book sharing application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet"/>
 </head>
<body>

<?php 

	require_once('require_files/loginHeader.inc.php');

?>


<div class="container">
	<div class="row" id="onerow">
		<div class="col-xl-6 col-md-6">
			<a href="<?php echo absolute_path.'addbook.php' ?>">
				<div class="jumbotron" id="menucards">
					<span class="glyphicon glyphicon-plus"></span> Add Book
				</div>
			</a>
		</div>


		<div class="col-xl-6 col-md-6">
			<a href="<?php echo absolute_path.'searchbook.php'; ?>">
				<div class="jumbotron" id="menucards">
					<span class="glyphicon glyphicon-search"></span> Search Books
				</div>
			</a>
		</div>


	</div>




	<div class="row" id="tworow">
		<div class="col-xl-6 col-md-6">
			<a href="<?php echo absolute_path.'yourbook.php' ?>">
				<div class="jumbotron" id="menucards">
					<span class="glyphicon glyphicon-book"></span> Your Books
				</div>
			</a>
		</div>


		<div class="col-xl-6 col-md-6">
			<a href="<?php echo absolute_path.'profile.php'; ?>">
				<div class="jumbotron" id="menucards">
					<span class="glyphicon glyphicon-user"></span> Profile
				</div>
			</a>
		</div>


	</div>
</div>

</body>
</html>









<?php

}else {


	header('location:'.absolute_path);
	exit();


}










?>