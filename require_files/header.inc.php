<?php

require_once('require_files/db.inc.php');

?>
<link href="http://localhost/libro/css/header.css" rel="stylesheet" />
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo absolute_path; ?>">Libro</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="sign-up.php">Sign Up</a></li>
	      <li><a href="log-in.php">Login</a></li>
	       <li><a href="about.php">About</a></li>
	    </ul>
	</div>
  </div>
</nav>