<?php
						error_reporting(E_ERROR | E_PARSE);
include_once('db.php');
?>
<?php
					error_reporting(E_ERROR | E_PARSE);
  $Crime_Name = $_POST['crimename'];
  $Crime_Desc = $_POST['crimedesc'];
  $likes = $_POST['likes'];
  $News_id = $_POST['newsid'];
  $insertNewComplaint = "INSERT IGNORE INTO NewsFeed(Crime_Name, Crime_Desc, likes, News_id) values
  ( '$Crime_Name', '$Crime_Desc', '$likes', '$News_id')";
    
    $run= mysqli_query($con, $insertNewComplaint);

    if(!$run)
    {
      die('Error: '.mysqli_error($con));
    }
		?>
<?php
      $sql = "SELECT * FROM `newsfeed`";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
?>
<?php
      $sqlbrib = "SELECT * FROM `newsfeed`
			where Crime_Name='Bribery'";
      $resultbrib=mysqli_query($con,$sqlbrib);
			$numbrib=mysqli_num_rows($resultbrib);
?>
<?php
      $sqlCusto = "SELECT * FROM `newsfeed`
			where Crime_Name='Custodial'";
      $resultCusto=mysqli_query($con,$sqlCusto);
			$numcusto=mysqli_num_rows($resultCusto);
?>
<?php
      $sql1 = "SELECT * FROM `newsfeed`
			where Crime_Name='Ignorance'";
      $result1=mysqli_query($con,$sql1);
			$num1=mysqli_num_rows($result1);
?>
<?php
      $sql2 = "SELECT * FROM `newsfeed`
			where Crime_Name='Manipulation'";
      $result2=mysqli_query($con,$sql2);
			$num2=mysqli_num_rows($result2);
?>
<?php
      $sql3 = "SELECT * FROM `newsfeed`
			where Crime_Name='Detention'";
      $result3=mysqli_query($con,$sql3);
			$num3=mysqli_num_rows($result3);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="admin_logo.png"/>

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="overlay-scrollbar">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
		</ul>
		<h2>OnDuty Admin</h2>
		<!-- end nav left -->
		<!-- form -->
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode">
				<a class="nav-link" href="#" onclick="switchTheme()">
					<i class="fas fa-moon dark-icon"></i>
					<i class="fas fa-sun light-icon"></i>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link">
					<i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
					<span class="navbar-badge">5</span>
				</a>
				<ul id="notification-menu" class="dropdown-menu notification-menu">
					<div class="dropdown-menu-header">
						<span>
							Notifications
					<div class="dropdown-menu-footer">
						<span>
							View all notifications
						</span>
					</div>
				</ul>
			</li>
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					<img src="images/admin_logo.png" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li class="dropdown-menu-item">
							<a href="admin.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-cog"></i>
								</div>
								<span>Complaints</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="hotspot.php" class="dropdown-menu-link">
								<div>
									<i class="far fa-credit-card"></i>
								</div>
								<span>Hotspots</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="stats.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-spinner"></i>
								</div>
								<span>Statistics</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="index.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<!-- end sidebar -->
	<!-- main content -->
	<div class="wrapper">
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-tasks"></i>
					</p>
					<h3><?php echo $numbrib;?></h3>
					<p>Bribery News</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<h3><?php echo $numcusto;?></h3>
					<p>Custodial Torture News</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<h3><?php echo $num1;?></h3>
					<p>Ignorance of Complaint</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
						<i class="fas fa-bug"></i>
					</p>
					<h3><?php echo $num2;?></h3>
					<p>Manipulation of Evidence</p>
				</div>
			</div>
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Newsfeed info
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>News ID</th>
									<th>Crime Name</th>
									<th>Crime Description</th>
									<th>Likes</th>
								</tr>
							</thead>
              <?php
        while($row=mysqli_fetch_assoc($result)){
       ?>
							<tbody>
								<tr>
                <td><?php echo $row['News_id'];?></td>
									<td><?php echo $row['Crime_Name'];?></td>
                  <td><?php echo $row['Crime_Desc'];?></td>
                  <td><?php echo $row['likes'];?></td>
                  <?php
              }
              ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-bug"></i>
					</p>
					<h3><?php echo $num3;?></h3>
					<p>Inlegal Detention</p>
			</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
      <div class="counter bg-danger">
        <p>
          <i class="fas fa-bug"></i>
        </p>
        <h3>NewsFeed</h3>
				<br>
        <form action="Newsfeed.php" method="post">
        <div class="contact-form">
          <div class="input-fields">
						<br>
            Reference Id:
            <input name="newsid"type="text" class="input" required>
						<br>
            Crime Name:
            <input name="crimename"type="text" class="input" required>
						<br>
            Crime Description:
            <input name="crimedesc" type="text" class="input" required>
						<br>
						Likes:
            <input name="likes" type="text" class="input" required>
						<br>
						<div style="margin-left:5px">
            <button href="Newsfeed.php" >Submit</button>
						</div>
          </form>
          </div>
        </div>
			</div>
      </div>
      </div>
		</div>
		</div>
					</div>
	</div>
		</div>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>
</html>