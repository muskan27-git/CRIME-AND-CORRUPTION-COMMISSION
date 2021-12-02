<?php
include_once('db.php');
?>
<?php
      $sql = "SELECT * FROM `statistics_`
      WHERE Crime_Name='Detention'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          $det=$row['Crime_Num'];
        }
      }
      global $det;
?>
<?php
      $sql = "SELECT * FROM `statistics_`
      WHERE Crime_Name='Bribery'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          $brib=$row['Crime_Num'];
        }
      }
      global $brib;
?>
<?php
      $sql = "SELECT * FROM `statistics_`
      WHERE Crime_Name='Ignorance'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          $ign=$row['Crime_Num'];
        }
      }
      global $ign;
?>
<?php
      $sql = "SELECT * FROM `statistics_`
      WHERE Crime_Name='Custodial'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          $cus=$row['Crime_Num'];
        }
      }
      global $cus;
?>
<?php
      $sql = "SELECT * FROM `statistics_`
      WHERE Crime_Name='Manipulation'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          $man=$row['Crime_Num'];
        }
      }
      global $man;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On The Duty</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">
            <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            scroll-behavior: smooth;
        }
    </style>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Civil Harrasment', 'Number'],
           ['Bribery',  <?php echo $brib;?>],
           ['Custodial Torture', <?php echo $cus;?>],
           ['Ignorance in Filing complaint', <?php echo $ign;?>],
           ['Manipulation of Evidence',<?php echo $man;?>],
           ['Illegal Detention', <?php echo $det;?>]
         ]);
         var options = {
           title: 'Civil Harrasment',
           width: 550,
           height: 370,
         };
         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options);
       }
     </script>
     <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ["Crimes", "Cases", { role: "style" } ],
           ["Bribery", <?php echo $brib;?>, "blue"],
           ["Custodial Torture", <?php echo $cus;?>, "blue"],
           ["Ignorance in Filing complaint", <?php echo $ign;?>, "blue"],
           ["Manipulation of Evidence", <?php echo $man;?>, "color: blue"],
           ["Illegal Detention", <?php echo $det;?>, "color: blue"],
         ]);
         var view = new google.visualization.DataView(data);
         view.setColumns([0, 1,
                          { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                          2]);
         var options = {
           title: "Civil Harrasment",
           width: 550,
           height: 370,
           bar: {groupWidth: "95%"},
           legend: { position: "none" },
         };
         var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
         chart.draw(view, options);
     }
     </script>
</head>

<body> 
    <header>
        <div id="menu">
            <div class="logo" style="width:15px;">
                <a href="#">
                    <img src="images/logo2.png" alt="state emblem">  
                </a>
            </div>
            <ul>
                <li><a href="login.php">Admin</a></li>
                <li><a href="#zzz">Home</a></li>
                <li><a href="complaint.php">File Report</a></li>
                <li><a href="#bbb">News Feed</a></li>
                <li><a href="#ccc">Hotspots</a></li>
                <li><a href="#ddd">About Us</a></li>
            </ul>
        </div>
        <section id="zzz">
        <div class="title">
            <h3>We at TeamOTD are there for you. We firmly believe in the constitution of our country and do whatever it takes to bring justice to the victims and expose the officers misusing their power.</h3>
        </div>

        <div class="button">
            <a href="#aaa" class="btn">STATISTICS</a>
            <a href="complaint.php" class="btn">SUBMIT REPORT</a>
            <a href="#ccc" class="btn">VIEW HOTSPOTS</a>
        </div>
      </section>
    </header>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(window).scrollTop()) {
                $("nav").addClass("black");
            } else {
                $("nav").removeClass("black");
            }
        });
    </script> -->

    <script>
        window.addEventListener("scroll", function() {
            let menu = document.getElementById('menu');
            if (window.pageYOffset > 0) {
                menu.classList.add("cus-nav");
            } else {
                menu.classList.remove("cus-nav");
            }
        });
    </script>
    <section id="aaa"> <br><br>
        <div class="container1">
            <div class="left">
          <h2 class="piehead">Civil Harrasment</h2>
                            
          <div id="piechart" class="chart"></div>
        </div>
        <div class="right">
          <h2 class="piehead">Total Crimes</h2>
          
        <div id="barchart_values" class="chart"></div>
        </div>
        </div>
        <div id="map"></div>
    </section>
    
    <section id="bbb"> <br><br>
        <div class="container1">
            <div class="left">
          <h2 class="piehead">TRENDING NEWS</h2> 
          <br><br><br>
          <br>
          <label for="news" class="he1">View News for:</label><br><br>
          <select id="crime-detail">
            <option>Select Name</option>
            <option value="bribery">Bribery</option>
            <option value="custodial">Custodial Torture</option> 
            <option value="ignorance">Ignorance in Filing complaint</option>
            <option value="manipulation">Manipulation of Evidence</option>
            <option value="detention">Illegal Detention</option>
            </select>
            <div id="details-container">
            <div class="bribery details">
          <p class="text"><br><?php
      $sql = "SELECT * FROM `newsfeed`
      WHERE Crime_Name='Bribery'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      echo $num;
      echo" News Found in the database for Bribery";
      echo "<br>";
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo $row['Crime_Desc'];
          echo "<br>";
        }
      }
      ?></p>
            </div>
            </div>
            <div id="details-container">
              <div class="custodial details">
                <p class="text"><br><?php
      $sql = "SELECT * FROM `newsfeed`
      WHERE Crime_Name='Custodial'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      echo $num;
      echo" News Found in the database for Custodial";
      echo "<br>";
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo $row['Crime_Desc'];
          echo "<br>";
        }
      }
      ?></p>
              </div>
              </div>
              <div id="details-container">
                <div class="ignorance details">
                  <p class="text"><br><?php
      $sql = "SELECT * FROM `newsfeed`
      WHERE Crime_Name='Ignorance'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      echo $num;
      echo" News Found in the database for Ignorance";
      echo "<br>";
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo $row['Crime_Desc'];
          echo "<br>";
        }
      }
      ?></p>
                </div>
                </div>
                <div id="details-container">
                  <div class="manipulation details">
                    <p class="text"><br><?php
      $sql = "SELECT * FROM `newsfeed`
      WHERE Crime_Name='Manipulation'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      echo $num;
      echo" News Found in the database for Manipulation";
      echo "<br>";
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo $row['Crime_Desc'];
          echo "<br>";
        }
      }
      ?></p>
                  </div>
                  </div>
                  <div id="details-container">
                    <div class="detention details">
<p class="text"><br><?php
      $sql = "SELECT * FROM `newsfeed`
      WHERE Crime_Name='Detention'";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
echo $num;
      echo" News Found in the database for Detention";
      echo "<br>";
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo $row['Crime_Desc'];
          echo "<br>";
        }
      }
      ?>
                      </p>
                    </div>
                    </div>
          </div>
          <div class="right">
          <h2 class="piehead">NEWS OF THE DAY</h2>
          <br><br><br><br>
          <div class="he"><br>
<?php
      $sql = "SELECT* FROM `newsfeed`
      ORDER BY likes DESC
      limit 1";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
echo $num;
      echo" Trending news found in the database";
      echo "<br><br>";
      echo "<div class='text'>";
      if($num>0){
        $row=mysqli_fetch_assoc($result);
          echo $row['Crime_Desc'];
          echo "<br><br>";
          $lik=$row['likes'];
      }
      echo "</div>";
      global $lik;
      ?>
          </div>
          <button class="like__btn">
            <span id="icon"><i class="far fa-thumbs-up"></i></span>
            <span id="count"><?php echo $lik;?></span> Like
         </button>
          </div>
          </div>
    </section>

    <section id="ccc"> <br>
        <div class="container1">
          <div class="left">
        <h2 class="piehead">Crime Hotspot</h2>
        <br>
        <div class="frame">
        <div class="he"> Chandigarh
    </div>
          <br>
<p class="text"><?php
      $sql = "SELECT * FROM `hotspots`
      where Crime_City='Chandigarh'
      limit 8";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
      if($num>0){
        while($row=mysqli_fetch_assoc($result)){
          echo '<b>City=></b>'.$row['Crime_City'].' <b>Area=></b>'.$row['Crime_Places'];
          echo "<br>";
          echo "<br>";
        }
      }
      ?>
      </p>
        </div>
        </div>
        <div class="right">
        <h2 class="piehead">Map</h2>
        <br>
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109741.02912911311!2d76.69348873658222!3d30.73506264436677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1622499313613!5m2!1sen!2sin"></iframe>
        </div>
        </div>
    </section>

  <br>
  <br>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" 53 crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
$("#crime-detail").change(function() {
var name =$("#crime-detail").val();
$(".details").hide();
$("."+name).show(); 
})
})
</script>
<script>
  const likeBtn = document.querySelector(".like__btn");
let likeIcon = document.querySelector("#icon"),
  count = document.querySelector("#count");

let clicked = false;
likeBtn.addEventListener("click", () => {
  if (!clicked) {
    clicked = true;
    likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
    count.textContent++;
  } else {
    clicked = false;
    likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
    count.textContent--;
  }
});
</script>
</body>
</html>
