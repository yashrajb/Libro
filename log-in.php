<?php

	require_once('require_files/db.inc.php');
	require_once('require_files/session.inc.php');

	$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error in establishing connection');

	$err = 'please fill all the blanks';


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


	header('location:'.absolute_path.'main.php');
	exit();



}else {

if(isset($_POST["email"]) AND !empty($_POST["email"]) AND isset($_POST["pass"]) AND !empty($_POST["pass"]))
	{

		$email = mysqli_real_escape_string($connect,strip_tags($_POST["email"]));
		$pass = md5(md5($_POST["pass"]));


$query = 'SELECT * FROM user WHERE user_name="'.$email.'" OR '.'electronics_mail="'.$email.'" AND '.'pass_key="'.$pass.'"';
$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result)!=0)
{

$row = mysqli_fetch_array($result);

$_SESSION["user_id"] = $row['id'];

header('location: '.absolute_path.'main.php');
exit();


}else {


	$err = 'User is not exist';

}







	}








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
  <link href="css/log-in.css" rel="stylesheet"/>
 </head>
<body>

<?php 

	require_once('require_files/header.inc.php');

?>

<div class="container">
<h2>Sign up</h2>
<p><?php echo $err; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="form-group">
	  <label for="email">Username or E-mail:</label>
	  <input type="text" name="email" class="form-control" id="email">
	</div>
	<div class="form-group">
	  <label for="pass">Password:</label>
	  <input type="password" name="pass" class="form-control" id="pass">
	</div>
	<input class="btn btn-default" type="submit" value="log in"/>
</form>
</div>



</body>
</html>


<?php	
}

?>




	