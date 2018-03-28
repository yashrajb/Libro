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
  <h2>Add Book</h2>
  <form action="bookinfo.php" method="POST">
    <div class="form-group">
      <label for="book_name">Name:</label>
      <input type="text" name="book_name" id="book_name" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="book_auth">Author:</label>
      <input type="text" name="book_auth" id="book_auth" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="book_publish">Publisher:</label>
      <input type="text" name="book_publish" id="book_publish" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="book_edition">Edition:</label>
      <input type="number" name="book_edition" id="book_edition" class="form-control" required/>
    </div>

    <div class="form-group">
      <label for="isAvail">Book is Available?</label>
          <select class="form-control" name="isAvail" id="isAvail" required>
            <option>Yes</option>
            <option>No</option>
          </select>
    </div>

    <div class="form-group">
      <label for="book_rent_days">How much days do you want to give for read?</label>
      <input type="number" name="book_rent_days" id="book_rent_days" class="form-control" required/>
    </div>


  <div id="locationField">
      <input class="form-control" id="autocomplete" placeholder="Enter your address"
             onFocus="geolocate()" name="address" required type="text"/>
    </div>

    <div class="table-bordered">
      <table class="table">
        <tr>
              <td class="label"><span style="color:black;font-size:17px;margin-top:12px;display:inline-block;">Street address</span></td>
              <td class="slimField"><input class="form form-control field" id="street_number" name="street_number" disabled="true" ></input></td>
              <td class="wideField" colspan="2"><input name="route" class="field form-control" id="route"
                    disabled="true" required></input></td>
          </tr>



          <tr>
        <td class="label"><span style="color:black;font-size:17px;margin-top:12px;display:inline-block;">City</td>
        <td class="wideField" colspan="3"><input name="city" class="field form-control" id="locality"
              disabled="true" required></input></td>
      </tr>
      <tr>
        <td class="label"><span style="color:black;font-size:17px;margin-top:12px;display:inline-block;">State</span></td>
        <td class="slimField"><input name="state" class="field form-control" id="administrative_area_level_1" disabled="true" required></input></td>
        <td class="label"><span style="color:black;font-size:17px;margin-top:12px;display:inline-block;">Zip code</span></td>
        <td class="wideField"><input name="zip_code" class="field form-control" id="postal_code"  disabled="true" required></input></td>
      </tr>
       <tr>
        <td class="label"><span style="color:black;font-size:17px;margin-top:12px;display:inline-block;">Country</span></td>
        <td class="wideField" colspan="3"><input name="country" class="field form-control"
              id="country" disabled="true" required></input></td>
      </tr>
      </table>
</div>

<input type="submit" style="margin-top:8px;display:inline-block" class="btn btn-default" value="submit"/>

  </form>
</div>

<script src="js/addbook.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdOIinwsvEB7TtzShobo1M0ZPOUTAxT08&libraries=places&callback=initAutocomplete"
        async defer></script>

</body>
</html>










 <?php

}else {
  header('location: '.absolute_path);
  exit();
}

?>

