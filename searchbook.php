<?php

require_once('require_files/db.inc.php');
require_once('require_files/session.inc.php');

if(isset($_SESSION["user_id"]) AND !empty($_SESSION["user_id"]))
{

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
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 595px;
       
       
       
        margin-bottom:0px;

      }

      #text-input {
        height:590px;
        margin-bottom:0px;
        background-color:white;
      }
      
      .col-lg-6 {
        margin-bottom:0px;
      }
      /* Optional: Makes the sample page fill the window. */
      /*html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/


      #text-input h2{
        margin-top:180px;
      }

       #text-input input{
        border:1px solid #4A148C!important;
      }

       #text-input input[type="submit"]{
        margin-top:8px;
        background-color:#4A148C;
        color:white;
        border:1px solid #4A148C!important;
      }

      .row {
        margin-top:-19px;

      }

      .col {
      
        margin-left:-10px
      }

     


    </style>
     <link href="css/main.css" rel="stylesheet"/>
  </head>

  <body>

    <?php


        require_once('require_files/loginHeader.inc.php');


    ?>
    <div class="container-fluid">

      <div class="row">

           <div class="col col-lg-6 col-xl-6 col-md-6">
              <div class="jumbotron" id="text-input">
                <h2>Search Book</h2>
                <input type="text" class="form-control" placeholder="type book name or author name" id="search"/>
                <input type="submit" class="btn btn-default" value="search" onClick="initMap();"/>
              </div>
            </div>




           <div class="map col col-lg-6 col-xl-6 col-md-6" style="width:693px;">
              <div id="map">
              
                <div class="text-center">
                  <h2 style="display:inline-block;margin-top:250px;text-transform: uppercase;">Map shown here</h2>
                  
                </div>    
                
              </div>
            </div>

    </div>
</div>
     <script src="js/searchbook.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGyTonuyQJ7Wp6qHYn-lh__5DfhdCk-Pk">
    </script>
  </body>
  </html>


<?php

}else {
  header('location :'.absolute_path);
  exit();
}

?>

