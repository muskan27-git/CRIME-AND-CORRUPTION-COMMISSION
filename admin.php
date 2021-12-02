<?php
session_start();

if(!$_SESSION['auth'])
{
    header('location:login.php');
}
?> 
<?php
include_once('db.php');
?>
<?php
      $sql = "SELECT * FROM `complaints`";
      $result=mysqli_query($con,$sql);
      $num=mysqli_num_rows($result);
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
							<a href="Newsfeed.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-cog"></i>
								</div>
								<span>Newsfeed</span>
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
			<!-- <div class="col-8 col-m-12 col-sm-12"> -->
				<div class="card">
					<div class="card-header">
						<h3>
							Complaints info
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email Address</th>
									<th>Phone Number</th>
									<th>Aadhar Number</th>
                  <th>Complaint Address</th>
                  <th>Complaint City</th>
                  <th>Complaint Desc</th>
									<th>Complaint Image</th>
								</tr>
							</thead>
              <?php
        while($row=mysqli_fetch_assoc($result)){
       ?>
							<tbody>
								<tr>
                <td><?php echo $row['Reference_id'];?></td>
									<td><?php echo $row['First_Name'];?></td>
                  <td><?php echo $row['Email_Address'];?></td>
                  <td><?php echo $row['Phone_Number'];?></td>
                  <td><?php echo $row['Aadhar_Number'];?></td>
                  <td><?php echo $row['Complaint_Address'];?></td>
                  <td><?php echo $row['Complaint_City'];?></td>
                  <td><?php echo $row['Complaint_Desc'];?></td>
									<td><img src="uploads/<?=$row['Complaint_Proof']?>"></td>
                  <?php
              }
              ?>
							</tbody>
						</table>
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