<?php

require_once('db.inc.php');
require_once('session.inc.php');


$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die('Error on establishing connection');

if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{


$query = 'SELECT user_name FROM user WHERE id='.$_SESSION["user_id"];
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);
?>
<link href="http://localhost/libro/css/header.css" rel="stylesheet" />
<link href="http://localhost/libro/css/header.css" rel="stylesheet" />
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo absolute_path.'main.php'; ?>">Libro</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php echo absolute_path.'main.php'; ?>">Hello, <?php echo $row['user_name']; ?></a></li>
	      <li><a href="<?php echo absolute_path.'logout.php'; ?>">Logout</a></li>
	       
	    </ul>
	</div>
  </div>
</nav>













<?php
}















?>