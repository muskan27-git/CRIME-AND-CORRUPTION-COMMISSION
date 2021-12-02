<?php
include_once('db.php');
error_reporting(E_ERROR | E_PARSE);
?>
<?php
      $sql = "SELECT * FROM `hotspots`";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
?>
<?php
      $sql1 = "SELECT * FROM `hotspots`
			where Crime_City='Chandigarh'";
      $result1=mysqli_query($con,$sql1);
			$num1=mysqli_num_rows($result1);
?>
<?php
      $sql2 = "SELECT * FROM `hotspots`
			where Crime_City='Delhi'";
      $result2=mysqli_query($con,$sql2);
			$num2=mysqli_num_rows($result2);
?>
<?php
      $sql3 = "SELECT * FROM `hotspots`
			where Crime_City='Jharkhand'";
      $result3=mysqli_query($con,$sql3);
			$num3=mysqli_num_rows($result3);
?>
<?php
      $sql4 = "SELECT * FROM `hotspots`
			where Crime_City='Telangana'";
      $result4=mysqli_query($con,$sql4);
			$num4=mysqli_num_rows($result4);
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
							<a href="Newsfeed.php" class="dropdown-menu-link">
								<div>
									<i class="far fa-credit-card"></i>
								</div>
								<span>Newsfeed</span>
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
					<h3><?php echo $num1;?></h3>
					<p>Chandigarh</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<h3><?php echo $num2;?></h3>
					<p>Delhi</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<h3><?php echo $num3;?></h3>
					<p>Jharkhand</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<h3><?php echo $num4;?></h3>
					<p>Telangana</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Hotspot info
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>Hotspot Id</th>
									<th>Crime City</th>
									<th>Crime Places</th>
								</tr>
							</thead>
							<?php
        while($row=mysqli_fetch_assoc($result)){
       ?>
							<tbody>
								<tr>
                <td><?php echo $row['Hotspot_id'];?></td>
									<td><?php echo $row['Crime_City'];?></td>
                  <td><?php echo $row['Crime_Places'];?></td>
                  <?php
              }
              ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-4 col-m-12 col-sm-12">
				<div class="card">
				<div class="counter bg-primary">
					<div class="card-header">
						<h3>
							Hotspot
						</h3>
						<br>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
          <form action="hotspot.php" method="post">
          <div class="contact-form">
            <div class="input-fields">
							<br>
              Id:
              <input name="hid" type="text" class="input" >
							<br>
              Crime City:
              <input type="text" class="input" name="crimecity" >
							<br>
              Crime Place:
              <input name="crimeplaces" type="text" class="input" >
							<br>
							<div style="margin-left: 50px;">
              <button href="hotspot.php">Submit</button>
							</div>
            </form>
						<?php
						error_reporting(E_ERROR | E_PARSE);
						$Crime_City = $_POST['crimecity'];
						$Crime_Places = $_POST['crimeplaces'];
						$Hotspot_id = $_POST['hid'];
						$insertNewComplaint = "INSERT IGNORE INTO Hotspots(Crime_City, Crime_Places, Hotspot_id) values
						( '$Crime_City', '$Crime_Places', '$Hotspot_id')";
							
							$run= mysqli_query($con, $insertNewComplaint);
					
							if(!$run)
							{
								die('Error: '.mysqli_error($con));
							}
					
						?>
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