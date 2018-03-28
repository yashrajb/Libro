<?php

	require_once('require_files/db.inc.php');
	require_once('require_files/header.inc.php');

	$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error on establishing connection');

	$err = '';


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


	header('location:'.absolute_path.'main.php');
	exit();



}






if(isset($_POST["usr"]) AND !empty($_POST["usr"]) AND isset($_POST["email"]) AND !empty($_POST["email"]) AND isset($_POST["pass"]) AND !empty($_POST["pass"]) AND isset($_POST["repass"]) AND !empty($_POST["repass"]))
{

$email = mysqli_real_escape_string($connect,strip_tags($_POST["email"]));
$username = mysqli_real_escape_string($connect,strip_tags($_POST["usr"]));
if(strlen($_POST["pass"]) > 7){

	$pass = md5(md5($_POST["pass"]));
	$repass = md5(md5($_POST["repass"]));

if($pass === $repass)
{


$query = 'SELECT * FROM user WHERE electronics_mail="'.$email.'" AND user_name="'.$username.'"';
$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result)==0){


$query1 = 'INSERT INTO `user` (`id`,`electronics_mail`,`user_name`,`pass_key`) VALUES 
(NULL,"'.$email.'",'.'"'.$username.'",'.'"'.$pass.'"'.')';

if($result1 = mysqli_query($connect,$query1))
{

	

$query2 = 'SELECT id FROM user WHERE electronics_mail="'.$email.'" AND '.'user_name="'.$username.'"';
$result2 = mysqli_query($connect,$query2);
$row2 = mysqli_fetch_array($result2);

$query3 = 'INSERT INTO `profiles` (id,user_name) VALUES (NULL,'.$row2['id'].')';

if($result3 = mysqli_query($connect,$query3))
{



	header('location:'.absolute_path.'log-in.php');
	exit();




}else {


	$err = 'something happen wrong';

}













}else {

	$err = 'something happen wrong';

}




}else {


	$err = 'email already exist';


}
















}else{


	$err = 'password is not same';


}













}else {


	$err = 'password must be more than 7 characters';


}

















}else {


	$err = 'please fill all the blanks';


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
  <link href="css/sign-up.css" rel="stylesheet"/>
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
	  <label for="usr">Username:</label>
	  <input type="text" name="usr" class="form-control" id="usr">
	</div>
	<div class="form-group">
	  <label for="email">E-mail</label>
	  <input type="email" name="email" class="form-control" id="email">
	</div>
	<div class="form-group">
	  <label for="pass">Password</label>
	  <input type="password" name="pass" class="form-control" id="pass">
	</div>
	<div class="form-group">
	  <label for="repass">Retype password</label>
	  <input type="password" name="repass" class="form-control" id="repass">
	</div>
	<input type="submit" value="Sign up" class="btn btn-default"/>
</form>

</div>

</body>
</html>