<?php

session_start();

$code="";

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
$con = mysqli_connect("localhost", "root", "Utkarsh1234");
      if (!$con) {
          die('Could not connect: ' . mysqli_connect_error());
      } else {
    
      }

      //Database Selection
      if (mysqli_select_db($con, "CivilDisobedience")) {
    
      } else {
          die("Error in Selecting the Database <br>". mysqli_errno($con));
      }

      $mysql="UPDATE Complaints SET Complaint_Verified= true WHERE Complaint_Verified=false";

      if (!mysqli_query($con, $mysql)) {
        die('Error: ' . mysqli_error($con));
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmartion</title>
        <style>
            <?php include 'conformation.css' ?>
        </style>
    </head>

    <body>
        <div class="container">
            <div class="left">
                <div class="header">
                    <h2 class="animation a1">Confirmation</h2>
                    <br>
                    <h4 class="animation a2">Hey, Your complaint is successfully filed with the portal with:<br><b>Reference Id: 454454525145</b>
    We will take neccessary action and get back to you as soon as possible.
    You would be notified when a officer would be assigned to your case.</h4>
                </div>
                    <a href="index.php">
                        <button class="animation a5">Back to Home Page</button>
                    </a>
            </div>
            <div class="right">
                <img src="images/emblem.jpg" alt="emblem" id="image">
            </div>
        </div>
    </body>

    </html>

<?php

include 'db.php';

session_destroy();
}
else
{
    header('location: complaint.php');
}

?>
