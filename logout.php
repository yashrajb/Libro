<?php

require_once('require_files/session.inc.php');
require_once('require_files/db.inc.php');

if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"])){



session_unset();

session_destroy();

header('Location:'.absolute_path);
exit;



}else {


	header('Location: '.absolute_path);
	exit;

}







?>