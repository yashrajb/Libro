<?php
require_once('require_files/db.inc.php');
require_once('require_files/session.inc.php');
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die();
$error = '';


if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{

if(isset($_POST) AND !empty($_POST)) {


if($_FILES["profile_photo"]["size"]>0) {

    
if($_FILES["profile_photo"]["type"]=="image/jpg" || $_FILES["profile_photo"]["type"]=="image/jpeg" || $_FILES["profile_photo"]["type"]=="image/png" || $_FILES["profile_photo"]["type"]=="image/gif")
{

  if($_FILES["profile_photo"]["size"] > 0) {

if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], 'uploaded-images/'.$_FILES["profile_photo"]["name"])) {




$query = 'UPDATE profiles SET pic="'.mysqli_escape_string($connect,$_FILES["profile_photo"]["name"]).'" WHERE user_name='.$_SESSION["user_id"];

$result = mysqli_query($connect,$query);



if(mysqli_affected_rows($connect)!=0) {

  header('location: '.absolute_path.'profile.php');
  exit();
}


}



}else {


    $error = 'Please upload not upload more than 900kb';

  }

}else {


$error = 'pls upload only png,jpg,jpeg,gif';



}







  }else {

$email = mysqli_real_escape_string($connect,strip_tags($_POST["email"]));
$username = mysqli_real_escape_string($connect,strip_tags($_POST["username"]));
$query2 = 'UPDATE `user` SET electronics_mail="'.$email.'",'.'user_name="'.$username.'"';

if($result2 = mysqli_query($connect,$query2))
{


  header('location:'.absolute_path.'edit.php');
  exit();

}




  }




}









if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"])) {


$query1 = 'SELECT * FROM profiles WHERE user_name='.$_SESSION["user_id"];
$result1 = mysqli_query($connect,$query1);
$rows1 = mysqli_fetch_array($result1);

$query2 = 'SELECT * FROM user WHERE id='.$_SESSION["user_id"];
$result2 = mysqli_query($connect,$query2);
$rows2 = mysqli_fetch_array($result2);

if(mysqli_num_rows($result1)!=0) 
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
 </head>
<body>
<?php require_once('require_files/loginHeader.inc.php'); ?>
<div class="container" id="main">
  <?php echo $error; ?>
  <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group">
        <label for="profile_photo">Profile photo:</label>
        <input type="file" name="profile_photo" id="profile_photo">
        <img class="thumbnail" style="width:250px;" src="<?php echo image_file_path.$rows1['pic']; ?>"/>
      </div>
  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="text" name="email" class="form-control" id="email" value="<?php echo $rows2['electronics_mail']; ?>">
  </div>
 <div class="form-group">
    <label for="username">Username:</label>
    <input name="username" class="form-control" id="username" value="<?php echo $rows2['user_name']; ?>"/>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>


<?php

    }

}else {

  header('location: '.absolute_path);
  exit();


}

?>
