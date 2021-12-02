<?php
      //CREATING DATABASE 
    $con = mysqli_connect("localhost", "root", "Utkarsh1234");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
               }
    $sql = "CREATE DATABASE IF NOT EXISTS CivilDisobedience";

    
    if (!mysqli_query($con, $sql)) {

        echo "Error creating database:  " . mysqli_errno($con);
        }


      //Connection
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

      
        //COMPLAINTS TABLE
      $sql = "create table IF NOT EXISTS Complaints(
                                          First_Name varchar(25) NOT NULL,
                                          Email_Address varchar(50),
                                          Phone_Number int(10), 
                                          Aadhar_Number int(15),
                                          Complaint_Address varchar(50),
                                          Complaint_City varchar(50),
                                          Complaint_Desc varchar(100),
                                          Complaint_Proof varchar(100),
                                          Complaint_Verified Boolean,
                                          Reference_id int NOT NULL AUTO_INCREMENT,
                                          PRIMARY KEY (Reference_id)
                                      )";

                                      if (!mysqli_query($con, $sql)) {
                                        die('Error: ' . mysqli_error($con));
                                    }
                                    

                                    $sql = "INSERT IGNORE INTO Complaints (First_Name, Email_Address, Phone_Number, Aadhar_Number, Complaint_Address, Complaint_City, Complaint_Desc, Complaint_Proof, Complaint_Verified, Reference_id)
                                    VALUES ('Royal','a@gmail.com', '111111111', '111111111', 'sector ab', 'chandigarh', 'complaint first', 'bribery.jpg', true,'1'),
                                           ('rajkumar', 'b@gmail.com','222222222', '22222222', 'sector bc', 'delhi', 'complaint second','custodial.jpg', true,'2'),
                                           ('Utkarsh', '    c@gmail.com','3333333333', '333333333', 'sector de', 'jharkhand', 'complaint third','illegal.jpg', false,'3'),
                                           ('yashasvi', 'd@gmail.com','4444444444', '444444444', 'sector ff', 'telegana', 'complaint fourth', 'manipulation.jpg', true,'4')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}


      $sql = "create table IF NOT EXISTS HotSpots (Crime_City varchar(25) NOT NULL,
                                     Crime_Places varchar(255), 
                                     Hotspot_id int NOT NULL, 
                                     PRIMARY KEY (Hotspot_id)
                                    )";
      if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    

    $sql = "INSERT IGNORE INTO Hotspots (Crime_City, Crime_Places, Hotspot_id)
    VALUES ('Chandigarh', 'sector 1','0'),
    ('Chandigarh', 'sector 2','1'),
    ('Chandigarh', 'sector 4','2'),
    ('Chandigarh', 'sector 12','3'),
    ('Chandigarh', 'sector 13','4'),
    ('Chandigarh', 'sector 17','5'),
           ('Delhi', 'sector bc','6'),
           ('Jharkhand', 'sector de','7'),
           ('Telangana', 'sector fg','8')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}


$sql = "create table IF NOT EXISTS NewsFeed (Crime_Name varchar(25) NOT NULL,
                               Crime_Desc varchar(100) NOT NULL,
                               likes Int NOT NULL,
                               News_id int NOT NULL,
                               PRIMARY KEY (News_id)
                            )";
if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}


$sql = "INSERT IGNORE INTO NewsFeed (Crime_Name, Crime_Desc, likes, News_id)
VALUES('Bribery', 'Mumbai Cops Allegedly Caught on Camera Talking Bribes, Probe Ordered', '23','0'), 
      ('Bribery', 'Goa Top Cop Accused Of Taking Bribe At Police Headquarters; Probe Ordered', '25','1'),
      ('Custodial', 'Custodial Torture Resulting in Death Unacceptable in Civilised Society: SC ', '1213','2'),
      ('Ignorance', 'Delhi Police is ignoring complaints and scuttling investigation in communal violence cases', '122','3'),
      ('Ignorance', 'Data on Arrests Under Section 66A Reveals Police Are Ignorant About Judicial Pronouncements', '156','4'),
      ('Ignorance', 'Cops ignorance of arrest norms allows accused to get bail', '156','5'),
      ('Custodial', 'Custodial torture: DySP to face probe in Sreejeev death case ', '213','6'),
      ('Bribery', 'Caught On Camera Taking A Bribe, Jammu & Kashmir Cop Suspended After Video Goes Viral', '233','7')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}


$sql = "create table IF NOT EXISTS Statistics_ (Crime_Name varchar(50) NOT NULL,
Crime_Num int(10),
Reference_ID int NOT NULL,
PRIMARY KEY (Reference_ID)
)";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}


$sql = "INSERT IGNORE INTO Statistics_ (Crime_Name, Crime_Num, Reference_id)
VALUES ('Bribery', '25','0'),
       ('Custodial', '10','1'),
       ('Ignorance', '20','2'),
       ('Manipulation', '30','3'),
       ('Detention', '40','4')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}



$sql = "create table IF NOT EXISTS users (id int(6) unsigned AUTO_INCREMENT,
    username varchar(25), 
    password varchar(25), 
    PRIMARY KEY (id)
    )";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_errno($con));
}

$sql = "INSERT IGNORE INTO users (id, username, password)
VALUES ('1', 'otd@gmail.com', 'otd')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}
?>
