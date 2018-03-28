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

<?php

$query1 = 'SELECT * FROM book_info WHERE book_username='.$_SESSION["user_id"];
$result1 = mysqli_query($connect,$query1);
$query2 = 'SELECT * FROM user';
$result2 = mysqli_query($connect,$query2);



 ?>

<div class="container">

 <table class="table">
    <thead>
      <tr>
        <th>Bookname</th>
        <th>isAvailable</th>
        <th>Borrower</th>
        <th>Days for the rent</th>
        <th>Delete book</th>
      </tr>
    </thead>
    <tbody>
      <?php 

        while($row1 = mysqli_fetch_array($result1)){


        ?>
      <tr>

        
        <td><?php echo $row1["book_name"]; ?></td>
        <td>
            <div class="form-group">
            <form action="isAvailability.php" method="POST">
        <select class="form-control" name="isAvail" id="isAvail">
                  <option value="yes"

                  <?php 
                    echo ($row1["isAvailable"]==1)? 'selected' : '';
                  ?>

                  >Yes</option>
                  <option value="no"

                  <?php 
                    echo ($row1["isAvailable"]==0)? 'selected' : '';
                  ?>

                  >No</option>
    
                </select>
                <input type="hidden" name="book_name" value="<?php echo $row1['id']; ?>"/>
                  <input class="btn btn-default" type="submit" value="submit"/>
            </form>
            
</div>
      </td>
            <td>



              <div class="form-group">

              <form action="borrow.php" method="POST">
                <?php

            $query6 = 'SELECT borrower_id FROM borrower WHERE book_id='.$row1["id"];
            $result6 = mysqli_query($connect,$query6);
            $row6 = mysqli_fetch_array($result6);

            if(!is_null($row6["borrower_id"])){

            
              $value = $row6["borrower_id"];


            }else {

              $value = NULL;


            }





             ?>
            <input list="profiles" name="borrower" value="<?php echo $value; ?>" class="form-control"/>

           <datalist id="profiles" >
                <?php 
                  while($row2 = mysqli_fetch_array($result2)) {
                 ?>

                 <option value="<?php echo $row2['electronics_mail']; ?>">

                <?php
                  }
                ?>
          </datalist>
          <input type="hidden" value="<?php echo $row1['id']; ?>" name="book_id"/>
          <input class="btn btn-default" type="submit" />
            </form>
            
        </div>




            </td>
            <td>
              <?php echo $row1["rent_days"]; ?>
            </td>
            <td>
              <a href="<?php echo absolute_path.'del.php?q='.$row1['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
     
      </tr>
       <?php
    }
      ?>
    </tbody>
  </table>

</div>



</body>
</html>











<?php


}else {
  header('location: '.absolute_path);
  exit();
}

?>







