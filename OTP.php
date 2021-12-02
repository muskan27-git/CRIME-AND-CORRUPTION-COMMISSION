<?php


error_reporting(E_ERROR | E_PARSE);

$con = mysqli_connect("localhost", "root", "Utkarsh1234", "CivilDisobedience");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
            }
            if (isset($_POST['submit'])){
                $file= $_FILES['file'];
                $img_name = $_FILES['file']['name'];
                    $img_size = $_FILES['file']['size'];
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $error = $_FILES['file']['error'];
                    if ($error === 0) {
                        if ($img_size > 125000) {
                            $em = "Sorry, your file is too large.";
                            header("Location: index.php?error=$em");
                        }else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);
                
                            $allowed_exs = array("jpg", "jpeg", "png"); 
                
                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                                $img_upload_path = 'uploads/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                
                                // Insert into Database
                                $sql = "INSERT INTO images(image_url) 
                                        VALUES('$new_img_name')";
                                mysqli_query($con, $sql);
                            }else {
                                $em = "You can't upload files of this type";
                                header("Location: index.php?error=$em");
                            }
                        }
                    }
  $First_Name = $_POST['name'];
  $Email_Address = $_POST['email'];
  $Phone_Number = $_POST['phoneNumber'];
  $Aadhar_Number = $_POST['aadharNumber'];
  $Complaint_Address = $_POST['address'];
  $Complaint_City = $_POST['city'];
  $Complaint_Desc = $_POST['crimeDesc'];
  $Complaint_Proof= $_POST['complaintProof'];
  $Complaint_Verified=false;

  
  $insertNewComplaint = "insert into Complaints (First_Name , Email_Address, Phone_Number, Aadhar_Number, Complaint_Address, Complaint_City, Complaint_Desc, Complaint_Proof, Complaint_Verified) values
  ( '$First_Name', '$Email_Address', '$Phone_Number', '$Aadhar_Number', '$Complaint_Address', '$Complaint_City', '$Complaint_Desc', '$new_img_name', '$Complaint_Verified'); ";
    
    $run= mysqli_query($con, $insertNewComplaint);

    if(!$run)
    {
      die('Error: '.mysqli_error($con));
    }

session_start();

$code=rand(100000,999999);
$_SESSION["code"]=$code;

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  

  $mail->SMTPDebug = 0;

  $mail->isSMTP();

  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

  $mail->SMTPAuth = TRUE;

  $mail->Username = "thecivilmisconductforum@gmail.com";
  $mail->Password = "19BITUSKY";

  $mail->SMTPSecure = "false";
  $mail->Port = 587;

  
  $mail->From = "thecivilmisconductforum@gmail.com";
  $mail->FromName = "OSP Project";
  
  $mail->addAddress($_POST["email"]);
  
  $mail->isHTML(true);

 
  $mail->Subject = "OTD Complaint Form OTP";
  $mail->Body = "<i>Your One Time Password is: </i>".$code;
  $mail->AltBody = "OTP: ";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else{

    $Complaint_Verified=true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <style>
        <?php include 'OTP.css' ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="header">
                <h2 class="animation a1">OTP Confirmation</h2>
                <h4 class="animation a2">Please, Enter the OTP send to the registered email<br><b><?php echo $Email_Address ?></b></h4>
            </div>
            <form action="OTP2.php" method="post">
                <div class="form">
                    <input type="text" class="form-field animation a3" placeholder="Enter OTP" name="captcha" required><br>
                    <a>
                        <button class="animation a5">CONFIRM</button>
                    </a>
                </div>
            </form>
        </div>
        <div class="right">
            <img src="images/emblem.jpg" alt="emblem" id="image">
        </div>
    </div>
</body>

</html>