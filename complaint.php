<center>

<?php

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

      $mysql="delete from Complaints where Complaint_Verified = false";

      if (!mysqli_query($con, $mysql)) {
        die('Error: ' . mysqli_error($con));
    }

?>

<style>
<?php include 'complaint.css' ?>
</style>
<div class="container">
        <div class="left">
            <div class="header">
                <h2 class="animation a1">Welcome to the Public Misconduct Forum </h2>
                <h4 class="animation a2">Please Enter You're Complaint Details</h4>
            </div>
            <form action="OTP.php" method="post" enctype="multipart/form-data">
            <div class="form">
                <input type="text" class="form-field animation a3" placeholder="First Name" name="name" required>
                
                <input type="email" class="form-field animation a3" placeholder="email" name="email" required>
                
                <input type="number" class="form-field animation a4" placeholder="Phone Number" name="phoneNumber" required>
                
                <input type="number" class="form-field animation a5" placeholder="Aadhar Number" name="aadharNumber" required>
                
                <input type="text" class="form-field animation a6" placeholder="Address" name="address" required>
                
                <input type="text" class="form-field animation a8" placeholder="City " name="city" required>
                
                <input type="text" class="form-field animation a9" placeholder="MisConduct Addressal" name="crimeDesc" required>
                    
                <label for="upload" class="form">
                        <input type="file" class="form-field animation a9" name="file" required>
                </label>
                <a>
                    <button class="animation a9" type="submit" name="submit">Submit</button> 
                </a>

            </div>
        </form>
        </div>
        <div class="right">
            <img src="images/emblem.jpg" alt="emblem" id="image">
        </div>
    </div>
</center>
<br>
<br>
<br>


