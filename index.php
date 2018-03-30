
<?php

	require_once('require_files/session.inc.php');
	require_once('require_files/db.inc.php');
	if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


	header('location: '.absolute_path.'main.php');
	exit();



}else {


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
  <link href="css/index.css" rel="stylesheet"/>
 </head>
<body class="container-fluid">

<?php 

  require_once('require_files/header.inc.php');

?>


<h2>Share books , Share Knowledge</h2>
<p>Libro is web platform where you can share books and search books</p>
<a class="btn btn-default" href="<?php echo absolute_path.'sign-up.php'; ?>">Sign up</a>
<a class="btn btn-default" href="<?php echo absolute_path.'log-in.php'; ?>">Login</a>




</body>
</html>



<?php
}
?>




