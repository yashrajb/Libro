<?php
	require_once('require_files/session.inc.php');
	require_once('require_files/db.inc.php');

	$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_SELECT) or die();

	if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"])){


		$book_name = mysqli_real_escape_string($connect,strip_tags($_POST["book_name"]));
	$book_auth = mysqli_real_escape_string($connect,strip_tags($_POST["book_auth"]));
	$book_publish = mysqli_real_escape_string($connect,strip_tags($_POST["book_publish"]));
	$book_edition = (is_numeric($_POST["book_edition"]))? $_POST["book_edition"] : 1;
	$isAvail = (mysqli_real_escape_string($connect,strip_tags($_POST["isAvail"]))==="Yes")? 1 : 0;
	$book_rent_days = is_numeric($_POST["book_rent_days"])? $_POST["book_rent_days"] : 10;
	$address = mysqli_real_escape_string($connect,strip_tags($_POST["address"]));
	$street_number = (is_null(mysqli_real_escape_string($connect,$_POST["street_number"])))? $_POST["street_number"] : 'NULL';
	$route = mysqli_real_escape_string($connect,strip_tags($_POST["route"]));
	$city = mysqli_real_escape_string($connect,strip_tags($_POST["city"]));
	$state = mysqli_real_escape_string($connect,strip_tags($_POST["state"]));
	$zip_code = (is_numeric($_POST["zip_code"]))? $_POST["zip_code"] : 'NULL';
	$country = mysqli_real_escape_string($connect,strip_tags($_POST["country"]));

	$exploded_address = explode(',',$address);
	$imploded_address = implode('+',$exploded_address);
	
	$imploded_address = preg_replace("/\s/",'',$imploded_address);

	$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$content = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$imploded_address.'&key=AIzaSyAkeMB9fvLxAmDfNqYTWmoAhn4gD3kOsVU', false, stream_context_create($arrContextOptions));

$json = json_decode($content,true);


$latitude = $json["results"][0]["geometry"]["location"]["lat"];
$longitude = $json["results"][0]["geometry"]["location"]["lng"];


$query = 'INSERT INTO `book_info` (`id`,`book_username`,`book_name`,`book_author`,`book_publisher`,`book_edition`,`isAvailable`,`rent_days`) VALUES (NULL,'.$_SESSION["user_id"].',"'.$book_name.'",'.'"'.$book_auth.'",'.'"'.$book_publish.'",'.$book_edition.','.$isAvail.','.$book_rent_days.')';


if($result=mysqli_query($connect,$query))
{

	$query2 = 'SELECT id FROM book_info WHERE book_name="'.$book_name.'"';
	
	if($result2 = mysqli_query($connect,$query2)){

		$row2 = mysqli_fetch_array($result2);

	$query3 = 'INSERT INTO `book_location` (`id`,`book_id`,`address`,`street_number`,`route`,`city`,`state`,`country`,`latitude`,`longitude`) VALUES (NULL,'.$row2["id"].',
	"'.$address.'",'.$street_number.',"'.$route.'",'.'"'.$city.'",'.'"'.$state.'",'.'"'.$country.'",
	'.$latitude.','.$longitude.')';


	if($result3 = mysqli_query($connect,$query3)){


		$query4 = 'INSERT INTO `borrower` (`id`,`book_id`,`user_id`,`borrower_id`) VALUES (NULL,'.$row2["id"].','.$_SESSION["user_id"].',NULL)';

		if($result4 = mysqli_query($connect,$query4)){


			header('location: '.absolute_path.'yourbook.php');
			exit();



		}






	}


	}else {
		echo 'not ok';
	}



}





		

	}else {


	header('location: '.absolute_path);
	exit();


}

	
	

	
?>